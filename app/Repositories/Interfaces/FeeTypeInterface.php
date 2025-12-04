<?php

namespace App\Repositories\Interfaces;

interface FeeTypeInterface
{
    public function listFeeTypes();

    public function listFeeTypesByClient($id);

    public function listFeeAmtByFeeType($id, $ft_id);
}
