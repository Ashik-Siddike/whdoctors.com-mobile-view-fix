<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class FlybdCategories extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
    ];

    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate();
    }
    public function flybds()
    {
        return $this->hasMany(Flybd::class, 'flybd_category_id');
    }
    
     public function down(): void
    {
        Schema::dropIfExist('flybd_categories');
    }
}
