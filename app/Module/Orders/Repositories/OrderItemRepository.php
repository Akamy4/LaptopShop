<?php

declare(strict_types=1);


namespace App\Module\Orders\Repositories;

use App\Module\Orders\Models\OrderItem;
use App\Module\Orders\Repositories\Contracts\OrderItemRepositoryInterface;

final class OrderItemRepository implements OrderItemRepositoryInterface
{
    public function create(OrderItem $model)
    {
        $model->saveOrFail();
    }

    public function update(OrderItem $model)
    {
        $model->updateOrFail();
    }

    public function destroy(int $id)
    {
        $order = OrderItem::find($id);
        $order->deleteOrFail();
    }
}
