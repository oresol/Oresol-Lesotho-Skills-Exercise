<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use DB;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public static function getTags()
    {
        $tags = Tag::all();
        return $tags;
    }


    public static function getArticleTags(int $id)
    {
        $articleTags = DB::select( DB::raw("SELECT tagdesc FROM tags WHERE 
                    id IN (SELECT tag_id FROM article_tags WHERE article_id = :var)"), 
                    array('var'=>$id));
        return $articleTags;
    }

    public function createTag(Request $request)
    {
        $validated = $request->validate([
            'tagdesc' => ['required', 'unique:tags', 'max:255','alpha_num:ascii'],
        ]);

        $tagid = self::storeTag($request->tagdesc);

        return back();
    }
    
    
    public static function storeTag(string $name)
    {
        $tag = Tag::where('tagdesc', $name )->first();

        if($tag == null)
        {
            $tagnew = new Tag();
            $tagnew->tagdesc = $name;
            $tagnew->save(); 
            
            return $tagnew->id;
        }
        
        return $tag->id;
    }

    public function deleteTag(int $id)
    {
        $tag = Tag::find($id);
        $tag->delete();

        return back();
    }

    public function editTag(Request $request, int $id)
    {
        $validated = $request->validate([
            'tagdesc' => ['required', 'unique:tags', 'max:255','alpha_num:ascii'],
        ]);

        $tag = Tag::find($id);

        if($tag !== null)
        {
            $tag->tagdesc = $request->tagdesc;
            $tag->save();
        }

        return back();
    }

}
