<?php

namespace App\Repositories\Interfaces;

interface RetTrkInterface
{
    public function saveReturnTracker($data);

    public function listReturnTrackers($data = null);
}
