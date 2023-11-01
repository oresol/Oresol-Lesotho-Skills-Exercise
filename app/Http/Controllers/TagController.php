<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(2);
        return view('admin.tags.index', compact('tags'));
    }

    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    public function create()
    {
        // Show the form to create a new tag
        return view('admin.tags.create');
    }

    public function store(Request $request)
    {
        // Validate and store a new tag
        // You should add validation logic here
        $tag = Tag::create($request->all());

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        // Show the form to edit an existing tag
        return view('admin.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        // Validate and update an existing tag
        // You should add validation logic here
        $tag->update($request->all());

        return redirect()->route('tags.index');
    }

    public function destroy(Tag $tag)
    {
        // Delete an existing tag
        $tag->delete();

        return redirect()->route('tags.index');
    }
}
