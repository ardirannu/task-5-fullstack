<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'desc',
        'content',
        'author',
    ];

    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
