<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'payment'; // আপনার টেবিলের নাম

    protected $fillable = [
        'amount_id',
        'paid',
        'date',
        'currency',
        'note',
    ];

    protected $casts = [
        'date' => 'date',
        'paid' => 'decimal:2',
    ];

    // Relationship: একটি পেমেন্ট একটি অ্যামাউন্টের সাথে সম্পর্কিত
    public function amount()
    {
        return $this->belongsTo(Amount::class, 'amount_id');
    }
    public function agent()
{
    return $this->belongsTo(User::class, 'agent_id'); // or 'received_by', depending on your schema
}

}
