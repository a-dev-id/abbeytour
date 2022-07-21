<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'website_title',
        'website_description',
        'email',
        'phone',
        'address',
        'facebook',
        'twitter',
        'instagram',
        'youtube',
        'whatsapp_number',
        'about_us',
        'about_us_description',
        'why_choose_us',
        'why_choose_us_description',
        'popular_destination',
        'popular_destination_description',
        'latest_news',
        'latest_news_description',
        'testimonial',
        'testimonial_description',
        'our_client',
        'our_client_description',
        'gallery',
        'gallery_description',
    ];
}
