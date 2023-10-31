<?php
namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PublishArticle;
use DB;

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
            session(['user_id' => $user->id]);
            return view('publish_article');
        
        } else {
            return redirect()->back()->with('message', 'Login failed: Incorrect password');
        }
    }

    public function AuthorArticles() {
        $user_id = session('user_id');
        $author = Author::find($user_id);
       
        if ($author) {
           
            $author_articles = $author->publishedArticles;
        
            return view('published_articles', ['author_articles' => $author_articles]);
        } else {
         
            return redirect()->back()->with('message', 'Author not found');
        }
    }
    
}

