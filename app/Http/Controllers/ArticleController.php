<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;


class ArticleController extends Controller
{
    public function index()
    {
       $articles = Article::paginate(2);   // set to two just to be able to see results
       return view('admin.articles.index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    public function create()
    {
        // Debugging: Display some information about the request.

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.articles.create', ['categories' => $categories, 'tags' => $tags]);

        dd('Inside create method');

    }


    public function store(Request $request)
    {
        // Validate the request data, e.g., title, full_text, and image

        // Create the article with user_id and category_id
       /* $article = Article::create([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category'),
        ]);*/


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('images', 'public'); // 'public' is the disk name
        } else {
            $imagePath = null; // Set to null if no image was uploaded
        }

        // Store the image path in the database
        $article = Article::create([
            'title' => $request->input('title'),
            'full_text' => $request->input('full_text'),
            'user_id' => auth()->user()->id,
            'category_id' => $request->input('category'),
            'image' => $imagePath,
        ]);

        // Get the tags input from the request and split them into an array
        $tagsInput = $request->input('tags');
        $tagsArray = is_array($tagsInput) ? $tagsInput : explode(',', $tagsInput);



        // Trim whitespace from each tag
        $tagsArray = array_map('trim', $tagsArray);

        // Attach tags to the article

        foreach ($tagsArray as $tagName) {
            // Include the tag's description if available
            $tagDescription = 'just a tag'; // Replace with the actual description
            $tag = Tag::firstOrCreate(['name' => $tagName], ['description' => $tagDescription]);
            $article->tags()->attach($tag->id);
        }

       /* foreach ($tagsArray as $tagName) {
            // Find the tag by name (assuming it exists in the database)
            $tag = Tag::where('name', $tagName)->first();

            if ($tag) {
                // Tag with the given name exists, so attach it to the article
                $article->tags()->attach($tag->id);
            }
        }*/


        // Redirect to the article index or show page
        return redirect()->route('articles.index', $article->id);
    }


    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $article->update($request->all());
        return redirect()->route('articles.index', $article->id);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index');
    }


    public function articles(){
        $articles = Article::paginate(4);
        return view('articles.articles', compact('articles'));
    }

    public function article($articleId){
        $article = Article::find($articleId);
        return view('articles.article', compact('article'));
    }

}
