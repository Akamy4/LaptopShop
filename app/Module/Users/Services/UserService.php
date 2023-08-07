<?php

declare(strict_types=1);


namespace App\Module\Users\Services;

use App\Module\Users\Services\Contracts\UserServiceInterface;
use App\Module\Users\Models\User;

class UserService implements UserServiceInterface
{
    public function getAll()
    {
        return User::query()->orderByDesc('id')->paginate();
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }
}
