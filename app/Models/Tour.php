<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_category_id',
        'title',
        'slug',
        'excerpt',
        'description',
        'cover_image',
        'banner_image',
        'order',
        'status',
        'featured',
    ];
}
