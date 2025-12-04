<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\FeeTypeInterface;

class FeeTypeController extends Controller
{
    protected $fee_type_interface;

    public function __construct(FeeTypeInterface $fee_type_interface)
    {
        $this->fee_type_interface = $fee_type_interface;
    }

    public function listFeeTypes()
    {
        try {
            return $this->fee_type_interface->listFeeTypes();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listFeeTypesByClient($id)
    {
        try {
            return $this->fee_type_interface->listFeeTypesByClient($id);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listFeeAmtByFeeType($id, $ft_id)
    {
        try {
            return $this->fee_type_interface->listFeeAmtByFeeType($id, $ft_id);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
