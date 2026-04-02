<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'n_id',
        'phone',
        'commission_rate',
        'address',
        'image',
        'id_card_front_image',
        'id_card_back_image',
        'date_of_birth',
        'details',
    ];

    /**
     * An agent has many transactions.
     */
   public function transactions()
{
    return $this->hasMany(Transaction::class);
}

}
