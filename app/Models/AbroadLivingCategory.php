<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\SlugOptions;

class AbroadLivingCategory extends Model
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
    public function AbroadLivings()
    {
        return $this->hasMany(AbroadLiving::class, 'abroad_category_id');
    }
     public function down(): void
    {
        Schema::dropIfExist('abroad_living_categories');
    }
}
