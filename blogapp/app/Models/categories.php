<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\articles;

class categories extends Model
{
    use HasFactory;
    protected $fillable = ['category_name'];
    // protected $table = 'categories';
    public function articles()
    {
        return $this->hasMany(articles::class);
    }
}
