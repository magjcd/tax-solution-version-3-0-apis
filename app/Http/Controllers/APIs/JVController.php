<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\JVRequest;
use App\Repositories\Interfaces\JVInterface;

class JVController extends Controller
{
    protected $jv_interface;

    public function __construct(JVInterface $jv_interface)
    {
        $this->jv_interface = $jv_interface;
    }

    public function addJV(JVRequest $req)
    {
        // return $req->all();
        // exit();
        try {
            return $this->jv_interface->addJV($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
