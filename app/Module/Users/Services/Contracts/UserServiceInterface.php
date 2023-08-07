<?php

namespace App\Module\Users\Services\Contracts;

interface UserServiceInterface
{
    public function getAll();

    public function getById($id);
}
