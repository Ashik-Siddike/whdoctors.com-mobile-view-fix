<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbroadLiving extends Model
{
    use HasFactory;
    protected $fillable = [
        'abroad_category_id',
        'title',
        'subtitle',
        'description',
    ];

   
    public function category()
    {
        return $this->belongsTo(AbroadLivingCategory::class, 'abroad_category_id');
    }
}
