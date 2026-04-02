<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    use HasFactory;

    protected $fillable = [
        'conference_category_id',
        'title',
        'subtitle',
        'description',
    ];


    public function category()
    {
        return $this->belongsTo(ConferenceCategories::class, 'conference_category_id');
    }
}
