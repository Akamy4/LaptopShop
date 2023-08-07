<?php

namespace App\Module\Orders\Services\Contracts;

interface OrderServiceInterface
{
    public function getAll();

    public function getById(int $id);
}
