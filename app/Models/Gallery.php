<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryGallery;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'author',
        'description',
        'date_taken',
        'location',
        'image_path',
        'category_gallery_id'
    ];

    public function category()
    {
        return $this->belongsTo(CategoryGallery::class, 'category_gallery_id');
    }
}
