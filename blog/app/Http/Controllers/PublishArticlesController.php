<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PublishArticle;

class PublishArticlesController extends Controller
{
    public function AddArticle(Request $request)
{
    $article_info = new PublishArticle;
    $user_id = session('user_id');

    $article_info->author_name = $request->input('author_name');
    $article_info->article_title = $request->input('article_title');
    $article_info->article_body = $request->input('article_body');
    $article_info->author_id = $user_id;
    $article_info->category = $request->input('category');
    $existingArticle = PublishArticle::where('article_title', $article_info->article_title)->first();

    if ($existingArticle) {
        return redirect('publish_article')->with('message', 'Publication failed: The story is already available');
    }

    $article_info->save();
    return redirect('publish_article')->with('success', 'Article Published Successfully');
}



    public function retrieveArticles()
    {
        $articles = PublishArticle::latest()->paginate(6);
        return view('article_data')->with(['published_articles' => $articles]);
    
    }

    public function displayFullStory($id)
{
    $article = PublishArticle::find($id); 
    return view('full_story', ['article' => $article]);
}
}
