<?php
namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthorLoginController extends Controller
{
    public function loginAuthor(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = Author::where('email', $email)->first();

        if (!$user) {
            return redirect()->back()->with('message', 'Login failed: Email not found');
        }

        if ($user->password == $password) {
            return view('publish_article');
        } else {
            return redirect()->back()->with('message', 'Login failed: Incorrect password');
        }
    }
}

