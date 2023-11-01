<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(2);
        return view('admin.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        // Display information about an individual category
        return view('admin.categories.show', compact('category'));
    }

    public function create()
    {
        // Show the form to create a new category
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new category
        // You should add validation logic here
        $category = Category::create($request->all());

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        // Show the form to edit an existing category
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Validate and update an existing category
        // You should add validation logic here
        $category->update($request->all());

        return redirect()->route('categories.index', $category->id);
    }

    public function destroy(Category $category)
    {
        // Delete an existing category
        $category->delete();

        return redirect()->route('categories.index');
    }
}
