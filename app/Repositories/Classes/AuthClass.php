<?php

namespace App\Repositories\Classes;

use App\Repositories\Interfaces\AuthInterface;

class AuthClass implements AuthInterface
{
    public function login($data)
    {
        try {
            $payload = [
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            $login = auth()->attempt($payload);

            if (! $login) {
                return response()->error(false, 'invalid credentials', 403);
            }

            $user = auth()->user();
            $token = $user->createToken('MyApp')->plainTextToken;

            return response()->success(true, ['token' => $token, 'user_info' => $user], null, 200);

        } catch (\Exception $e) {
            return response()->error(false, $e->getMessage(), 500);
        }
    }
}
