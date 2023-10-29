<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = 'author_table';
    protected $fillable = ['names','email',  'token', 'password'];
}
