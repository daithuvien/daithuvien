<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        session(['url.intended' => url()->previous()]);
        $this->redirectTo = session()->get('url.intended');
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
    {
        Auth::logout();    
        $request->session()->invalidate();    
        $request->session()->regenerateToken();    
        return redirect('/');
    }

    public function login(Request $request)
    {
        $input=$request->all();
        $password=$input['password'];
        $email=$input['email'];
        $user = User::where('email', $email)->first();
        if($user){
            if($user->role->id == 1 || $user->email_verified_at != null) {
                $credentials = request(['email', 'password']);
                $token = auth()->attempt($credentials);
                if (!$token) {            
                    return redirect('/login')->with('message','Vui lòng kiểm tra lại Email/Password !');
                }else{
                    return redirect()->intended('/');
                }
            }else{
                return redirect('/login')->with('message','Email chưa xác thực!');
            }
        } else {
            return redirect('/login')->with('message','Vui lòng kiểm tra lại Email/Password !');
        }
    }

    public function redirect($provider)    
    {   
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $user = null;
            $socialInfo = Socialite::driver($provider)->user();
            if ($provider == "facebook") {
                $user = User::where('delete_flag', 0)->where('facebook_id', $socialInfo->getId())->first();
                //if user not exist
                if (!$user) {                
                    $user = User::create([
                        'name' => $socialInfo->name,
                        'email' => $socialInfo->email,
                        'facebook_id' => $socialInfo->getId(),
                        'role_id' => 2,
                        'password' => 'NULL',
                        'created_by' => $provider,
                        'updated_by' => $provider,
                        'delete_flag' => false,
                        'email_verified_at' => date('Y-m-d H:i:s'),
                    ]);
                }     
            }
            if ($provider == "google") {
                $user = User::where('delete_flag', 0)->where('google_id', $socialInfo->getId())->first();
                if (!$user) {
                    $user = User::create([
                        'name' => $socialInfo->name,
                        'email' => $socialInfo->email,
                        'google_id' => $socialInfo->getId(),
                        'role_id' => 2,
                        'password' => 'NULL',
                        'created_by' => $provider,
                        'updated_by' => $provider,
                        'delete_flag' => false,
                        'email_verified_at' => date('Y-m-d H:i:s'),
                    ]);
                }    
            }
            
            //Auth::login($user);
            Auth::loginUsingId($user->id);
            return redirect()->to(session()->get('url.intended'));

        } catch (Exception $e) {
            return redirect('/login')->with('message','Vui lòng kiểm tra lại Email/Password !');
        }
    }
}
