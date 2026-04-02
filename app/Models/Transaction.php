<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
   protected $fillable = [
        'agent_id',
        'particulars',
        'total_amount',
        'paid',
        'dues',
        'currency',
        'date',
        'note',
    ];

    public function agent(){
        return $this->belongsTo(Agent::class,'agent_id');
    }
    // public function cashTransactions(){
    //     return $this->hasMany(CashTransaction::class,'transaction_id');
    // }



}
