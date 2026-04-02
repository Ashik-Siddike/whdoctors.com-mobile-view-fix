<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Flybd extends Model
{
    use HasFactory;

    protected $fillable = [
        'flybd_category_id',
        'title',
        'subtitle',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(FlybdCategories::class, 'flybd_category_id');
    }

}
