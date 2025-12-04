<?php

namespace App\Repositories\Classes;

use App\Models\BranchOffice;
use App\Repositories\Interfaces\BranchOfficeInterface;

class BranchOfficeClass implements BranchOfficeInterface
{
    public function listBranchOffice()
    {
        try {

            $list_branch_offices = BranchOffice::get();

            return response()->success(true, $list_branch_offices, null, 200);

        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
