<?php

namespace App\Validation;

use App\Models\UserModel;

class UserRules
{
    public function validateUser($str, string $fields, array $data)
    {
        $user = new UserModel();

        $user = $user->where('email', $data['email'])->first();

        if (!$user) return false;


        return password_verify($data['password'], $user->password);
    }
}
