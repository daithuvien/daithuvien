<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;

class DownloadController extends Controller
{
    public function download($id)
    {
        //save download history for user
        
        //get download real url
        $data = Data::where('id', $id)->first();
        return redirect($data->url);
        
    }    
}
