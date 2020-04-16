<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['id','title', 'body', 'category_id', 'user_id','created_at'];
    protected $hidden = ['updated_at'];
}
