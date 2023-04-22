<?php

namespace App\Services\User;

use App\Models\User;

class UserService
{
    public static function userIsRegistered($email, $data)
    {
        if ($user = User::query()->where('email', $email)->first()) {
            return $user;
        } else {
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->save();
            return $user;
        }
    }
}
