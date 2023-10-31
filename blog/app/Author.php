<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author_table';
    protected $fillable = ['names','email', 'password'];

     public function publishedArticles()
     {
         return $this->hasMany(PublishArticle::class, 'author_id');
     }
}
