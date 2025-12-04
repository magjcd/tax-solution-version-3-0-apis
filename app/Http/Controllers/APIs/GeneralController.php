<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\GeneralInterface;

class GeneralController extends Controller
{
    protected $general_interface;

    public function __construct(GeneralInterface $general_interface)
    {
        $this->general_interface = $general_interface;
    }

    public function listFeeApplied()
    {
        try {
            return $this->general_interface->listFeeApplied();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listClassification()
    {
        try {
            return $this->general_interface->listClassification();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listLinkAccounts()
    {
        try {
            return $this->general_interface->listLinkAccounts();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
