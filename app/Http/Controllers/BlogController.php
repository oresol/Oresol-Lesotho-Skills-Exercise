<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    function welcome()
    {
        return view('welcome1');
    }
    function aboutPage()
    {
        return view('about');
    }
}
