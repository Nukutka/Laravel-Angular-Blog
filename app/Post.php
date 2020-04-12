<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'category_id', 'user_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
