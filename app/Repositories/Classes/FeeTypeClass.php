<?php

namespace App\Repositories\Classes;

use App\Models\ClientFeeType;
use App\Models\FeeType;
use App\Repositories\Interfaces\FeeTypeInterface;
use Illuminate\Support\Facades\DB;

class FeeTypeClass implements FeeTypeInterface
{
    public function listFeeTypes()
    {
        try {
            $list_fee_types = FeeType::get();

            return response()->success(true, $list_fee_types, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listFeeTypesByClient($id)
    {
        try {
            $client_array = explode('|', $id);

            $client_id = $client_array[0];
            $header_id = $client_array[1];
            $sub_header_id = $client_array[2];
            $city_id = $client_array[3];
            // DB::enableQueryLog();

            $list_fee_types_by_client = ClientFeeType::with('feeName')->whereClientId($client_id)->get();

            // return DB::getQueryLog();

            return response()->success(true, $list_fee_types_by_client, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listFeeAmtByFeeType($id, $ft_id)
    {
        try {
            $client_array = explode('|', $id);

            $client_id = $client_array[0];
            $header_id = $client_array[1];
            $sub_header_id = $client_array[2];
            $city_id = $client_array[3];

            $list_fee_amt_fee_types = ClientFeeType::where(['client_id' => $client_id, 'fee_type_id' => $ft_id])->first();

            return response()->success(true, $list_fee_amt_fee_types, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
