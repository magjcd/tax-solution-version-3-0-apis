<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientFeeTypeRequest;
use App\Http\Requests\ClientRequest;
use App\Repositories\Interfaces\ClientInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $client_interface;

    public function __construct(ClientInterface $client_interface)
    {
        $this->client_interface = $client_interface;
    }

    public function addClientStep1(ClientRequest $req)
    {
        // return $req->all();
        try {
            return $this->client_interface->addClientStep1($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function updateClientProfile(ClientRequest $req)
    {
        try {
            return $this->client_interface->updateClientProfile($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listClients()
    {
        try {
            return $this->client_interface->listClients();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listClientProfile($id)
    {
        try {
            return $this->client_interface->listClientProfile($id);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listBusinessStatus()
    {
        try {
            return $this->client_interface->listBusinessStatus();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function listCities()
    {
        try {
            return $this->client_interface->listCities();
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function addClientFeeTypes(ClientFeeTypeRequest $req)
    {
        try {
            return $this->client_interface->addClientFeeTypes($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function UpdateClientStatus(Request $req)
    {
        try {
            return $this->client_interface->UpdateClientStatus($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
