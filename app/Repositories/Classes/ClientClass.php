<?php

namespace App\Repositories\Classes;

use App\Models\BusinessStatus;
use App\Models\City;
use App\Models\Client;
use App\Models\ClientFeeType;
use App\Models\ClientProfile;
use App\Repositories\Interfaces\ClientInterface;
use Illuminate\Support\Facades\DB;

class ClientClass implements ClientInterface
{
    public function addClientStep1($data)
    {
        DB::beginTransaction();
        try {

            $client_payload = [
                'business_status_id' => $data['business_status_id'],
                'client_name' => $data['client_name'],
                'header_id' => 1,
                'sub_header_id' => 1,
                'cnic_ntn_no' => $data['cnic_ntn_no'],
                'city_id' => $data['city_id'],
                'user_id' => auth()->user()->id,
            ];

            $add_client = Client::create($client_payload);
            $client_profile_payload = [
                'client_id' => $add_client->id,
                'business_name' => $data['business_name'],
                // 'user_id' => auth()->user()->id,
            ];

            ClientProfile::create($client_profile_payload);
            DB::commit();

            return response()->success(true, null, 'client added', 201);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function updateClientProfile($data)
    {
        DB::beginTransaction();
        try {

            $client_payload = [
                'business_status_id' => $data['business_status_id'],
                'client_name' => $data['client_name'],
                'header_id' => 1,
                'sub_header_id' => 1,
                'cnic_ntn_no' => $data['cnic_ntn_no'],
                'city_id' => $data['city_id'],
                'user_id' => auth()->user()->id,
            ];

            Client::whereId($data['id'])->update($client_payload);

            $client_profile_payload = [
                'client_address' => $data['client_profile']['client_address'],
                'user_fbr_id' => $data['client_profile']['user_fbr_id'],
                'ptcl_no' => $data['client_profile']['ptcl_no'],
                'cell_no1' => $data['client_profile']['cell_no1'],
                'cell_no2' => $data['client_profile']['cell_no2'],
                'branch_office_id' => $data['client_profile']['branch_office_id'],
                'business_address' => $data['client_profile']['business_address'],
                'fee_applied_id' => $data['client_profile']['fee_applied_id'],
                'classification_id' => $data['client_profile']['classification_id'],
                'tax_office_id' => $data['client_profile']['tax_office_id'],
                'rto_id' => $data['client_profile']['rto_id'],
                'business_category_id' => $data['client_profile']['business_category_id'],
                'fbr_id' => $data['client_profile']['fbr_id'],
                'fbr_password' => $data['client_profile']['fbr_password'],
                'pin_code' => $data['client_profile']['pin_code'],
                'link_account_id' => $data['client_profile']['link_account_id'],
                'email_id' => $data['client_profile']['email_id'],
                'business_name' => $data['client_profile']['business_name'],
                // 'user_id' => auth()->user()->id,
            ];

            ClientProfile::whereClientId($data['id'])->update($client_profile_payload);
            DB::commit();

            return response()->success(true, null, 'client updated', 200);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listClients()
    {
        try {
            $list_client = Client::with('city')->get();

            return response()->success(true, $list_client, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listClientProfile($id)
    {
        try {
            $list_client = Client::whereId($id)->with(['clientProfile', 'businessStatus', 'city', 'feeTypes', 'feeTp', 'linkAccount'])->first();

            return response()->success(true, $list_client, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listBusinessStatus()
    {
        try {
            $list_bus_stat = BusinessStatus::all();

            return response()->success(true, $list_bus_stat, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }

    }

    public function listCities()
    {
        try {
            $list_cities = City::all();

            return response()->success(true, $list_cities, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function addClientFeeTypes($data)
    {
        try {
            $payload = [
                'client_id' => $data['client_id'],
                'fee_type_id' => $data['fee_type_id'],
                'fee_amount' => $data['fee_amount'],
                'registeration_date' => $data['reg_date'],
            ];

            $where_clase = [
                'client_id' => $data['client_id'],
                'fee_type_id' => $data['fee_type_id'],
            ];

            $add_client_fee_types = ClientFeeType::updateOrCreate($where_clase, $payload);

            return $add_client_fee_types ? response()->success(true, null, 'fee type added', 201) : response()->error(false, 'fee_type could not be added', 403);

        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function UpdateClientStatus($data)
    {
        try {
            $update_status = Client::whereId($data['id'])->update([
                'active' => $data['status'],
            ]);

            return $update_status ? response()->success(true, null, 'client status updated', 200) : response()->error(false, 'client status could not be updated', 403);

        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
