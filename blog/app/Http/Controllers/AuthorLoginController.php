<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthorLoginController extends Controller
{
    public function LoginAuthor (request $request ){

        $email=$request->input('email');
        $password = $request->input('password');

        $user = Author::where('email', '=', $email)->first();
        $userPass = Author::where('password', '=', $password)->first();
        if (!$user) {
           return response()->json(['status'=>400, 'message' => 'Login Fail, please check email address']);
        }
        if (!$userPass) {
           return response()->json(['status'=>400, 'message' => 'Login Fail, pls check password']);
        }

        return view('add_article');
    }


}
