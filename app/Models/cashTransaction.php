<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cashTransaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_id',
        'amount',
        'currency',
        'date',
        'note'
    ];

    public function transaction(){
        return $this->belongsTo(Transaction::class);
    }

}
