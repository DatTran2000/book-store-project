<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function __invoke(){
        Mail::to('trancongdat21012000@gmail.com')->send(new WelcomeMail());
        return response()->json("send email successfully");
    }
}
