<?php
namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PublishArticle;
use App\Categories;
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
    

    public function displayEntireArticle($id)

    {
        $article = PublishArticle::find($id); 
        return view('author_articles', ['article' => $article]);
    }

   public function editArticle($id)
   {
       $articles = PublishArticle::find($id);
       return view('author_articles', ['article' => $article]);
   }

    public function deleteArticle($id){
            DB::table('publish_articles')->where('id', $id)->delete();
            return redirect()->back()->with('success', 'Article deleted Successfully');
    
    }


    public function updateArticle(Request $request, $id)
    {
        $this->validate($request,[
            'author_name'=>'required',
            'article_title' => 'required',
            'article_body' => 'required'
        ]);
        $author_name = $request->input('author_name');
        $article_title = $request->input('article_title');
        $article_body = $request->input('article_body');
        DB::update('UPDATE publish_articles SET author_name = ?, article_title = ?, article_body = ? WHERE id = ?', [$author_name, $article_title, $article_body, $id]);
        return redirect()->back()->with('success', 'Article Updated Successfully');
    }


    public function AddCategory(Request $request)
        {
            $category_info = new Categories;
            $user_id = session('user_id');
            $category_info->author_id = $user_id;
            $category_info->category_name = $request->input('category_name'); 

            $existingCategory = Categories::where('category_name', $category_info->category_name)->first();

            if ($existingCategory) {
                return redirect('add_categories')->with('message', 'Failed: The Category is already available');
            }

            $category_info->save();
            return redirect('add_categories')->with('success', 'Category Added Successfully');
        }

        public function displayCategories(){
            $user_id = session('user_id');
            $categories = Categories::where('author_id', $user_id)->get();
            dd($categories);
            return view('publish_article', ['categories' => $categories]);
        }
}

