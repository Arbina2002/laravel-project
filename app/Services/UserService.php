<?php

namespace App\Services;

use App\BOs\UserBO;
use Illuminate\Support\Facades\Cache;

class UserService
{
    protected UserBO $userBO;
    protected int $cacheTTL = 3600; // 1 hour

    public function __construct(UserBO $userBO)
    {
        $this->userBO = $userBO;
    }

    public function createUser(array $data)
    {
        $user = $this->userBO->createUser($data);

        // Cache newly created user
        Cache::put("user_{$user->id}", $user, $this->cacheTTL);

        return $user;
    }

    public function getUserById(int $id)
    {
        return Cache::remember(
            "user_{$id}",
            $this->cacheTTL,
            fn () => $this->userBO->getUserById($id)
        );
    }

    public function updateUser(int $id, array $data)
    {
        $user = $this->userBO->updateUser($id, $data);

        // Invalidate cache on update
        Cache::forget("user_{$id}");

        if ($user) {
            Cache::put("user_{$id}", $user, $this->cacheTTL);
        }

        return $user;
    }
}
