<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Http\Requests\StorearticlesRequest;
use App\Http\Requests\UpdatearticlesRequest;

class ArticlesController extends Controller
{
   /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $articles = articles::all();
        
        return view('posts.index')->with('articles', $articles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorearticlesRequest $request)
    {
        articles::create($request->validated());
        return back()->with('success', 'Article created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(articles $article)
    {
        return view('posts.show')->with('article', $article);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(articles $article)
    {
        return view('posts.edit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatearticlesRequest $request, articles $article)
    {
        $article->update($request->validated());
        return back()->with('success', 'Article updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(articles $articles)
    {
        $articles->delete();
        return back()->with('success', 'Article deleted successfully!');
    }
}
