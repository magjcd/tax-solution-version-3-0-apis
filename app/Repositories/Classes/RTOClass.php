<?php

namespace App\Repositories\Classes;

use App\Models\Rto;
use App\Repositories\Interfaces\RTOInterface;

class RTOClass implements RTOInterface
{
    public function listRTOs()
    {
        try {
            $list_rtos = Rto::get();

            return response()->success(true, $list_rtos, null, 200);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }

    }
}
