<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\categories;
use App\Models\articles;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         $categories = categories::all();
       View::share('categories', $categories);
        $articles = articles::all();
       View::share('articles', $articles);
    }
    

}
