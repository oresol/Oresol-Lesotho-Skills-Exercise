<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    // Define the relationship with the Article model (articles with the tag).
    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }
}
