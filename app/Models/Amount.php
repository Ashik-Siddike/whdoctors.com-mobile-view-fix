<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Amount extends Model
{
    use HasFactory;

    protected $table = 'amount';

    protected $fillable = [
        'agent_id',
        'particulars',
        'amount',
        'date',
        'currency',
        'note',
    ];

    protected $casts = [
        'date' => 'date',
        'amount' => 'decimal:2',
    ];

    // Relationships
    public function payments()
    {
        return $this->hasMany(Payment::class, 'amount_id');
    }

    // Optional: Accessor for due
    public function getDuesAttribute()
    {
        return $this->amount - $this->payments()->sum('paid');
    }
    // app/Models/Amount.php
public function agent()
{
    return $this->belongsTo(Agent::class);
}

}
