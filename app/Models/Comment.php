<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Comment extends Model
{
    public function book()
    {
        return $this->belongsTo('App\Models\Book', 'book_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
