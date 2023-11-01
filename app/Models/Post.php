<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
	public $timestamps = false;
    protected $table = 'posts';

    protected $fillable = ['title', 'description', 'category' , 'tags'];

    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
