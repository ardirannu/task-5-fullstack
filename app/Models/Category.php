<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    
    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function post(){
        return $this->hasMany('App\Models\Posts', 'id');
    }

    public function article(){
        return $this->hasMany('App\Models\Article', 'id');
    }
}
