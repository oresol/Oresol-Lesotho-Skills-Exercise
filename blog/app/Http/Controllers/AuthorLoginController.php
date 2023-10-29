<?php

namespace App\Http\Controllers;
use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade

class AuthorLoginController extends Controller
{
    public function LoginAuthor(Request $request) {
        $email = $request->input('email');
        $password = $request->input('password');
    
        // Find the user by email (assuming email is unique)
        $user = Author::where('email', $email)->first();
    
        if (!$user) {
            return response()->json(['status' => 400, 'message' => 'Login Fail, please check your email']);
        }
    
        if ($user->password == $password) {
            // Password matches, authentication is successful
            return view('about_us');
        } else {
            return response()->json(['status' => 400, 'message' => 'Login Fail, please check your password']);
        }
    }
}    
