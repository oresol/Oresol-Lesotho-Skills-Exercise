<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getCategories()
    {
        $categories = Category::all();
        return $categories;
    }

    public static function getCategorybyId(int $id )
    {
        $category = Category::find($id);
        return $category;
    }

    public function createCategory(Request $request)
    {
        $validated = $request->validate([
            'catdesc' => ['required', 'unique:categories', 'max:255','alpha_num:ascii'],
        ]);

        $catid = self::storeCategory($request->catdesc);

        return back();
    }

    public static function storeCategory(string $name)
    {
        $category = Category::where('catdesc', $name )->first();
        
        if($category === null )
        {
            $catnew = new Category();
            $catnew->catdesc = $name;
            $catnew->save(); 

            return $catnew->id;
        }
        else
        {
            return $category->id;
        }
        
    }

    public function deleteCategory(int $id)
    {
        $category = Category::find($id);
        $category->delete();

        return back();
    }

    public function editCategory(Request $request, int $id)
    {
        $validated = $request->validate([
            'catdesc' => ['required', 'unique:categories', 'max:255','alpha_num:ascii'],
        ]);

        $category = Category::find($id);

        if($category !== null)
        {
            $category->catdesc = $request->catdesc;
            $category->save();
        }

        return back();
    }
}
