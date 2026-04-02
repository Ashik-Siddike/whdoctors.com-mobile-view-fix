<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoData extends Model
{
    use HasFactory;


    protected $fillable = [
        'route_name',
        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_image',
    ];
}
