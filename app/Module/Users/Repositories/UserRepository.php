<?php

declare(strict_types=1);


namespace App\Module\Users\Repositories;

use App\Module\Users\Events\UserCreatedEvent;
use App\Module\Users\Repositories\Contracts\UserRepositoryInterface;
use App\Module\Users\Models\User;

final class UserRepository implements UserRepositoryInterface
{
    public function create(User $user)
    {
        $user->saveOrFail();
    }

    public function update(User $user)
    {
        $user->update();
    }

    public function delete($id)
    {
       $user = User::find($id);
       $user->delete();
    }
}
