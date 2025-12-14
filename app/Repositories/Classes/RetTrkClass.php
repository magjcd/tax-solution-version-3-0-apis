<?php

namespace App\Repositories\Classes;

use App\Models\Ledger;
use App\Repositories\Interfaces\RetTrkInterface;
use Illuminate\Support\Facades\DB;

class RetTrkClass implements RetTrkInterface
{
    public function saveReturnTracker($data)
    {
        DB::beginTransaction();
        try {

            $client_array = explode('|', $data['client_info']);

            $client_id = $client_array[0];
            $header_id = $client_array[1];
            $sub_header_id = $client_array[2];
            $city_id = $client_array[3];
            $client_name = $client_array[4];

            $client_payload = [
                'trans_date' => $data['transaction_date'],
                'client_id' => $client_id,
                'header_id' => $header_id,
                'sub_header_id' => $sub_header_id,
                'city_id' => $city_id,
                'fee_type_id' => $data['fee_type_id'],
                'fee_year' => $data['tax_years'],
                'dr_amt' => $data['fee_amount'],
                'bar_code' => $data['bar_code'],
                'submission_date' => $data['submission_date'],
                'details' => $data['short_comments'],
                'doc_type' => 'ret_trk',
                'user_id' => auth()->user()->id,
            ];

            Ledger::create($client_payload);

            $revenue_payload = [
                'trans_date' => $data['transaction_date'],
                'client_id' => 1,
                'header_id' => 4,
                'sub_header_id' => 3,
                'city_id' => $city_id,
                'fee_type_id' => $data['fee_type_id'],
                'fee_year' => $data['tax_years'],
                'cr_amt' => $data['fee_amount'],
                'bar_code' => $data['bar_code'],
                'submission_date' => $data['submission_date'],
                'details' => $data['short_comments'],
                'doc_type' => 'ret_trk',
                'user_id' => auth()->user()->id,
            ];
            Ledger::create($revenue_payload);

            DB::commit();

            $message = '<strong>'.$data['fee_type_id'].' '.$data['fee_amount'].' </strong>for years <strong>'.$data['tax_years'].'</strong> of <strong>'.$client_name.'</strong> is recorded';

            return response()->success(true, null, $message, 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listReturnTrackers($id = null)
    {
        try {
            $list_ret_trks = Ledger::with('client_info.clientProfile', 'city', 'fee_type')->whereHeaderId(1)->whereSubHeaderId(1)->get();
            $list_sng_ret_trk = Ledger::with('client_info', 'city', 'fee_type')->whereClientId($id)->get();

            $result = $id ? $list_sng_ret_trk : $list_ret_trks;

            return response()->success(true, $result, null, 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
