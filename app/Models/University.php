<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class University extends Model
{
    use HasFactory;
    protected $fillable = [
        'type',
        'country_id',
        'image',
        'cover_image', // 'cover_image
        'name',
        'description',
        'address',
        'program',
        'tuition_fee',
        'living_cost',
        'application_date',
        'application_date_2',
        'application_date_3',
        'admission_requirements',
        'is_show_homepage',
        'is_partner',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'meta_image',
    ];

 public $timestamps = true;

    public function country(): BelongsTo {
        return $this->belongsTo(Countries::class);
    }

    /**
     * The universities that belong to the course.
     */
    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class, 'university_course');
    }
}
