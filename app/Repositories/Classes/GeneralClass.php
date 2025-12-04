<?php

namespace App\Repositories\Classes;

use App\Models\Classification;
use App\Models\FeeApplied;
use App\Models\LinkAccount;
use App\Repositories\Interfaces\GeneralInterface;

class GeneralClass implements GeneralInterface
{
    public function listFeeApplied()
    {
        try {
            $list_fee_applied = FeeApplied::get();

            return response()->success(true, $list_fee_applied, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }

    }

    public function listClassification()
    {
        try {
            $list_fee_applied = Classification::get();

            return response()->success(true, $list_fee_applied, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listLinkAccounts()
    {
        try {
            $list_link_accs = LinkAccount::get();

            return response()->success(true, $list_link_accs, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
