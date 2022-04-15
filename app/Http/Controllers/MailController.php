<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegisterEmail;

class MailController extends Controller
{
    public static function sendRegisterEmail($email, $code) {
        $data= [
            'email' => $email,
            'code' => $code
        ];
        Mail::to($email)->send(new RegisterEmail($data));
    }
}
