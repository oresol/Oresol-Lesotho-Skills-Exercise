<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublishArticle extends Model
{
    protected $table = 'publish_articles';
    protected $fillable = ['author_name','article_title', 'article_body', 'author_id'];
}
