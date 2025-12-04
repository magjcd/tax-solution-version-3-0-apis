<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user_interface;

    public function __construct(UserInterface $user_interface)
    {
        $this->user_interface = $user_interface;
    }

    public function SignUp(Request $req)
    {
        $payload = [
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password,
            'role_id' => $req->role_id,
        ];

        return $this->user_interface->SignUp($payload);
    }

    public function addUser(AddUserRequest $req)
    {
        try {
            return $this->user_interface->addUser($req);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
