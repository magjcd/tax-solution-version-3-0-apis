<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\RetTrRequest;
use App\Repositories\Interfaces\RetTrkInterface;

class RetTrkController extends Controller
{
    protected $ret_trk_interface;

    public function __construct(RetTrkInterface $ret_trk_interface)
    {
        $this->ret_trk_interface = $ret_trk_interface;
    }

    public function saveReturnTracker(RetTrRequest $req)
    {
        try {
            return $this->ret_trk_interface->saveReturnTracker($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listReturnTrackers($id = null)
    {
        try {
            return $this->ret_trk_interface->listReturnTrackers($id);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
