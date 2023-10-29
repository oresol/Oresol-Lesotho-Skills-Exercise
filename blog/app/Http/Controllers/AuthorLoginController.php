<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AuthorLoginController extends Controller
{
    public function LoginAuthor(Request $request) {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
           
            return view('add_article');
        } else {
           
            return response()->json(['status' => 400, 'message' => 'Login Fail, please check your credentials']);
        }
    }
}
