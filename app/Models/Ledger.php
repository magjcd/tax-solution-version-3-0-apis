<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = [
        'gj_date',
        'client_id',
        'header_id',
        'sub_header_id',
        'city_id',
        'fee_type_id',
        'tax_year',
        'dr_amt',
        'cr_amt',
        'fee_year',
        'bar_code',
        'submission_date',
        'details',
        'doc_type',
        'user_id',
    ];

    public function client_info()
    {
        return $this->hasOne(Client::class, 'id', 'client_id');
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function fee_type()
    {
        return $this->hasOne(FeeType::class, 'id', 'fee_type_id');
    }
}
