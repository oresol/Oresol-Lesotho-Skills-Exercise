<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function createCategory()
    {
         return view('categories.createcategory');
    }

    public function createPost()
    {
         return view('posts.create');
    }
    
    public function createTags()
    {
         return view('tags.create');
    }
}
