<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\AuthInterface;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $auth_interface;

    public function __construct(AuthInterface $auth_interface)
    {
        $this->auth_interface = $auth_interface;
    }

    public function login(Request $req)
    {
        try {
            return $this->auth_interface->login($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
