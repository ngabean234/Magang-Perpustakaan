<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;

class Book extends Model
{
    protected $fillable = ['category_id'];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment')->orderBy('created_at', 'asc');
    }
}
