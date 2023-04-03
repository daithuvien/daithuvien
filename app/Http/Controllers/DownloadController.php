<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use App\Models\DownloadHistory;
use App\Models\CourseLink;

class DownloadController extends Controller
{
    public function download($id)
    {
        $courseId = explode(".", $id)[0];
        $dataId = explode(".", $id)[1];
        
        $data = Data::where('id', $dataId)->first();
        $providerName = CourseLink::where([['course_id',$courseId],['provider_url',$dataId]])->first()->provider_name;

        $user = \Auth::user();
        
        if($user != null) {
            //save download history for user
            if(strtolower($providerName) != "gdrive") {
                DownloadHistory::create([
                    'user_id' => $user->id,
                    'course_id' => $courseId,
                    'provider' => $providerName,
                    'link' => $dataId,
                ]);
            } else {            
                if ($user->role->id != 2) {
                    #if user not a normal member
                    DownloadHistory::create([
                        'user_id' => $user->id,
                        'course_id' => $courseId,
                        'provider' => strtolower($providerName),
                        'link' => $dataId,
                    ]);
                } else {
                    #if user just as a normal member - user just only download 3 gdrive link as a day
                    #get number of gdrive download today
                    $count = count(DownloadHistory::where([['user_id', $user->id],['provider', 'gdrive'],['created_at', '>=',date('Y-m-d').' 00:00:00']])->get());
                    
                    if($count >= 3) {
                        return view('client.download.limitation', compact('count'));
                    } else {
                        DownloadHistory::create([
                            'user_id' => $user->id,
                            'course_id' => $courseId,
                            'provider' => strtolower($providerName),
                            'link' => $dataId,
                        ]);
                    }
                }
            }
            
            //get download real url
            
            return redirect($data->url);
            
        } else {
            return redirect('/login');
        }
    }
}
