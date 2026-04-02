<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    use HasFactory;
    protected $fillable = [
        'page_id',
        'hints',
        'title',
        'subtitle',
        'image',
        'description',
        'number',
        'button_text',
        'button_link',
        'is_not_deleteable',
        'active_status',
    ];


    public function page(){
        return $this->belongsTo(Page::class);
    }
}
