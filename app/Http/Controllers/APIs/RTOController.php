<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\RTOInterface;

class RTOController extends Controller
{
    protected $rto_interface;

    public function __construct(RTOInterface $rto_interface)
    {
        $this->rto_interface = $rto_interface;
    }

    public function listRTOs()
    {
        try {
            return $this->rto_interface->listRTOs();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
