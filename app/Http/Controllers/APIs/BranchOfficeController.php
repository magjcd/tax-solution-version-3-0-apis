<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\BranchOffice;
use App\Repositories\Interfaces\BranchOfficeInterface;

class BranchOfficeController extends Controller
{
    protected $branch_office_interface;

    public function __construct(BranchOfficeInterface $branch_office_interface)
    {
        $this->branch_office_interface = $branch_office_interface;
    }

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
