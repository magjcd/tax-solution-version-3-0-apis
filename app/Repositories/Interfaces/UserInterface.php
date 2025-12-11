<?php

namespace App\Repositories\Interfaces;

interface UserInterface
{
    public function SignUp($data);

    public function addUser($data);

    public function listUser($id = null);
}
