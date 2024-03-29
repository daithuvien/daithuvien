<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => '',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
            'created_by' => 'register',
            'updated_by' => 'register',
            'delete_flag' => false,
            'ip_address' => $data['ip_address'],
        ]);
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $data["ip_address"] = $request->ip();
        $check_user = User::where('email', $request->email)->orWhere('ip_address', $request->ip())->first();
        if($check_user){
            return redirect()->route('login')->with('message', 'Tài Khoản đã tồn tại, xin vui lòng thử lại! Hoặc liên hệ Administrator');
        }else{
            $this->validator($data)->validate();
            $user = $this->create($data);
            event(new Registered($user));
            $this->guard()->login($user);
            return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
        }

    }

    protected function guard()
    {
        return Auth::guard();
    }

    protected function redirectTo() {
        return '/xac-nhan';
    }
}
