<?php

namespace App\BOs;

use App\DAOs\UserDao;
use Illuminate\Support\Facades\Hash;

class UserBO
{
    protected UserDao $userDao;

    public function __construct(UserDao $userDao)
    {
        $this->userDao = $userDao;
    }

    public function createUser(array $data)
    {
        // Business rule: encrypt password
        $data['password'] = Hash::make($data['password']);

        // Business rule: normalize email
        $data['email'] = strtolower($data['email']);

        return $this->userDao->create($data);
    }

    public function updateUser(int $id, array $data)
    {
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        return $this->userDao->update($id, $data);
    }

    public function getUserById(int $id)
    {
        return $this->userDao->findById($id);
    }
}
