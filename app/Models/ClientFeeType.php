<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ClientFeeType extends Model
{
    protected $fillable = [
        'client_id',
        'fee_type_id',
        'fee_amount',
        'reg_date',
    ];

    public function feeName(): HasOne
    {
        return $this->hasOne(FeeType::class, 'id', 'fee_type_id');
    }
}
