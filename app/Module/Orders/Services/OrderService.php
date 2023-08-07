<?php

declare(strict_types=1);

namespace App\Module\Orders\Services;

use App\Module\Orders\Models\Order;
use App\Module\Orders\Services\Contracts\OrderServiceInterface;

final class OrderService implements OrderServiceInterface
{

    public function getAll()
    {
        return Order::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById(int $id)
    {
        return Order::findOrFail($id);
    }
}
