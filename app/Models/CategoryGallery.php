<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryGallery extends Model
{
    protected $table = 'category_galleries';
    protected $fillable = ['name', 'slug','photo'];

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'category_gallery_id');
    }
}
