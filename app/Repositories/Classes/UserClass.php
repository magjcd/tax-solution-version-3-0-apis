<?php

namespace App\Repositories\Classes;

use App\Models\Profile;
use App\Models\RoleUser;
use App\Models\User;
use App\Repositories\Interfaces\UserInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserClass implements UserInterface
{
    public function SignUp($data)
    {

        DB::beginTransaction();
        try {

            $payload = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            $user_info = User::create($payload);

            RoleUser::create([
                'user_id' => $user_info->id,
                'role_id' => $data['role_id'],
            ]);

            DB::commit();

            return response()->success(true, null, null, 201);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }

    public function addUser($data)
    {

        DB::beginTransaction();
        try {

            $payload = [
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make('password'),
            ];

            $user_info = User::create($payload);

            Profile::create([
                'user_id' => $user_info->id,
            ]);

            DB::commit();

            return response()->success(true, null, 'user created', 201);
        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
