<?php

namespace App\Http\Controllers;

use App\Models\categories;
use App\Http\Requests\StorecategoriesRequest;
use App\Http\Requests\UpdatecategoriesRequest;

class CategoriesController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('categories.index')->with('categories', categories::all());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.createcategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecategoriesRequest $request)
    {
        categories::create($request->validated());
        return back()->with('success', 'Category created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(categories $category)
    {
        return view('categories.show')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(categories $category)
    {
         return view('categories.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecategoriesRequest $request, categories $category)
    {
        $category->update($request->validated());
        return back()->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(categories $category)
    {
        $category->delete();
        return back()->with('success', 'Category deleted successfully!');
    }
}
