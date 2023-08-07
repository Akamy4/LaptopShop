<?php

declare(strict_types=1);


namespace App\Module\Orders\Services;

use App\Module\Orders\Models\OrderItem;
use App\Module\Orders\Services\Contracts\OrderItemServiceInterface;

final class OrderItemService implements OrderItemServiceInterface
{

    public function getAll()
    {
        return OrderItem::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById(int $id)
    {
        return OrderItem::findOrFail($id);
    }
}
