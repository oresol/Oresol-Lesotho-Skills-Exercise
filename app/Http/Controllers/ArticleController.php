<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
// use App\Models\Category;
use Illuminate\Http\Request;
use App\DTO\ArticleDto;
use DB;



class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $articles = Article::all();

        $articleDtos = [];

        foreach ($articles as $article) {

            $articleDto = $this->createArticleDTo($article); 

            array_push($articleDtos,  $articleDto );            
        }

        return view("base",['articles' => $articleDtos]);

    }

    private function createArticleDTo(Article $article)
    {


        $category = CategoryController::getCategorybyId($article->category_id);
            
        $articleDto = new ArticleDto();
        $articleDto->id = $article->id;
        $articleDto->title = $article->title;
        $articleDto->fullText = $article->fullText;
        $articleDto->category = $category->catdesc;

        $tags  = TagController::getArticleTags($article->id);
        
        $names = [];

        foreach ($tags as $tag) {
            array_push($names,  $tag->tagdesc );            
        }

        $articleDto->tags = $names;

        return $articleDto;
    
    }

    public function editArticle(Request $request,int $id)
    {
         $validated = $request->validate([
            'title' => ['required', 'max:255','alpha_num:ascii'],
            'fullText' => ['required'],
            'tagdesc' => ['required', 'max:255'],
            'catdesc' => ['required', 'max:255','alpha_num:ascii'],
        ]);

        $cat_id = CategoryController::storeCategory($request->catdesc);

        DB::table('articles')->where('id', $id)->update([
            'title'=> $request->title, 
            'category_id'=> $cat_id, 
            'image'=> $request->image, 
            'fullText'=> $request->fullText]);

        ArticleTagsController::storeArticleTag($request->tagdesc, $id );

        return back()->with('success', 'Successfully Updated');
    }

    public function getEditArticle(int $id)
    {
        $article = Article::find($id);
        $articleDto = $this->createArticleDTo($article); 

        $categories = CategoryController::getCategories();
        $tags = TagController::getTags();

        return view("edit",['article' => $articleDto, 'tags' => $tags, 'categories'=> $categories]);


    }

    public function getCreate()
    {
        $categories = CategoryController::getCategories();
        $tags = TagController::getTags();

        return view("create",['tags' => $tags, 'categories'=> $categories]);
    }

    public function addArticle(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'max:255','alpha_num:ascii'],
            'fullText' => ['required'],
            'catdesc' => ['required', 'max:255','alpha_num:ascii'],
            'tagdesc' => ['required', 'max:255'],
        ]);
        

        $cat_id = CategoryController::storeCategory($request->catdesc);
        
        $article = new Article();
        $article->title = $request->title;
        $article->fullText = $request->fullText;
        $article->category_id = $cat_id;
        $article->image = $request->image;
        
        $article->save();

        ArticleTagsController::storeArticleTag($request->tagdesc, $article->id );

        return back()->with('success', 'Successfully created an article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function deleteArticle(int $id)
    {
        $article = Article::find($id);
        $article->delete();

        return back();
    }

    
}
