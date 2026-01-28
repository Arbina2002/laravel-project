<?php

namespace App\DAOs;

use App\Models\User;

class UserDao
{
    public function create(array $data)
    {
        return User::create($data);
    }

    public function findById(int $id)
    {
        return User::find($id);
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function update(int $id, array $data)
    {
        $user = User::find($id);

        if (!$user) {
            return null;
        }

        $user->update($data);
        return $user;
    }
}
