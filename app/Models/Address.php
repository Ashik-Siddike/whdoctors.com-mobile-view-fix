<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable=[
        'text',
        'full_address',
        'phone',
        'email',
        'working_hour',
        'is_show_on_navbar'
    ];
}
