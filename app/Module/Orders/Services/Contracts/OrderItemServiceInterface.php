<?php

namespace App\Module\Orders\Services\Contracts;

interface OrderItemServiceInterface
{
    public function getAll();

    public function getById(int $id);
}
