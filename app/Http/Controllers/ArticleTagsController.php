<?php

namespace App\Http\Controllers;

use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use DB;

class ArticleTagsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    public function manageProps()
    {
        $tags = TagController::getTags();
        $categories = CategoryController::getCategories();

        return view('manage',['tags'=>$tags, 'categories'=>$categories]);
    }

    public function getbyArticleId(int $id)
    {
        $articleTag = ArticleTag::where('article_id', $id);
        
    }

    public static function storeArticleTag(string $tags, int $article_id )
    {

        $articleTags = DB::statement("DELETE FROM article_tags WHERE article_id = '$article_id' ");

        $tagsArr = explode(",", $tags);

        foreach ($tagsArr as $tag) {
            $tag_ = Tag::where('tagdesc', $tag )->first();
            $tag_id = 0;

            if($tag_ === null)
            {
                 $tag_ =  preg_replace('/[^a-z0-9]/i','', $tag_);
                if($tag != "")
                {
                    $tag_id = TagController::storeTag($tag);
                }
            }
            else
            {
                $tag_id = $tag_->id;
            }

            if($tag_id != 0)
            {
                $articleTag = new ArticleTag();
                $articleTag->article_id = $article_id;
                $articleTag->tag_id = $tag_id;
                $articleTag->save();
            }

        }
    }

}
