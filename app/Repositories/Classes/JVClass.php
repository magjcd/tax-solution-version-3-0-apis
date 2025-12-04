<?php

namespace App\Repositories\Classes;

use App\Models\Ledger;
use App\Repositories\Interfaces\JVInterface;
use Illuminate\Support\Facades\DB;

class JVClass implements JVInterface
{
    public function addJV($data)
    {
        // return $data->all();
        DB::beginTransaction();
        try {
            $client_array = explode('|', $data['client_info']);
            $client_id = $client_array[0];
            $header_id = $client_array[1];
            $sub_header_id = $client_array[2];
            $city_id = $client_array[3];

            $client_payload = [
                'gj_date' => $data['jv_date'],
                'client_id' => $client_id,
                'header_id' => $header_id,
                'sub_header_id' => $sub_header_id,
                'city_id' => $city_id,
                'fee_type_id' => $data['fee_type_id'],
                'fee_year' => $data['fee_year'],
                'details' => $data['details'],
                'dr_amt' => $data['debit_amount'] ? $data['debit_amount'] : 0,
                'cr_amt' => $data['credit_amount'] ? $data['credit_amount'] : 0,
                'user_id' => auth()->user()->id,
            ];
            // exit();
            $representative_payload = [
                'gj_date' => $data['jv_date'],
                'client_id' => $client_id,
                'header_id' => $header_id,
                'sub_header_id' => $sub_header_id,
                'city_id' => $city_id,
                'fee_year' => $data['fee_year'],
                'fee_type_id' => $data['fee_type_id'],
                'details' => $data['details'],
                'dr_amt' => $data['debit_amount'] ? 0 : $data['credit_amount'],
                'cr_amt' => $data['credit_amount'] ? 0 : $data['debit_amount'],
                'user_id' => auth()->user()->id,
            ];

            Ledger::create($client_payload);
            Ledger::create($representative_payload);
            DB::commit();

            return response()->success(true, '', 'JV added', 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
