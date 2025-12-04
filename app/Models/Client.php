<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'business_status_id',
        'client_name',
        'header_id',
        'sub_header_id',
        'cnic_ntn_no',
        'city_id',
        'user_id',
    ];

    public function clientProfile()
    {
        return $this->hasOne(ClientProfile::class);
    }

    public function city()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function businessStatus()
    {
        return $this->hasOne(BusinessStatus::class, 'id', 'business_status_id');
    }

    public function feeTypes()
    {
        return $this->belongsToMany(FeeType::class, 'client_fee_types');
    }

    public function feeTp()
    {
        return $this->hasMany(ClientFeeType::class, 'fee_type_id', 'id');
    }

    public function linkAccount()
    {
        return $this->hasOne(LinkAccount::class, 'id', 'link_account_id');
    }
}
