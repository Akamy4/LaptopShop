<?php

namespace App\Module\Users\Repositories\Contracts;

use App\Module\Users\Models\User;

interface UserRepositoryInterface
{
    public function create(User $user);

    public function update(User $user);

    public function delete($id);
}
