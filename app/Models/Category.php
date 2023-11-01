<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];


    // Define the relationship with the Article model (articles in the category).
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
