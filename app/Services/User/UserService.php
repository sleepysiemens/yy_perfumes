<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    public static function userIsRegistered($email, $data)
    {
        if ($user = User::query()->where('email', $email)->first()) {
            return $user;
        } else {
            $password = $random = Str::random(8);

            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($password);
            $user->save();
            return $user;
        }
    }
}
