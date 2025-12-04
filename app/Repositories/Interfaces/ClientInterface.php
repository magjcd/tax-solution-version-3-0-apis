<?php

namespace App\Repositories\Interfaces;

interface ClientInterface
{
    public function addClientStep1($data);

    public function updateClientProfile($data);

    public function listClients();

    public function listClientProfile($id);

    public function listBusinessStatus();

    public function listCities();

    public function addClientFeeTypes($data);

    public function UpdateClientStatus($data);
}
