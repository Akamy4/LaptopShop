<?php

declare(strict_types=1);


namespace App\Module\Orders\Repositories;

use App\Module\Orders\Models\Order;
use App\Module\Orders\Repositories\Contracts\OrderRepositoryInterface;

final class OrderRepository implements OrderRepositoryInterface
{
    public function create(Order $model)
    {
        $model->saveOrFail();
    }

    public function update(Order $model)
    {
        $model->updateOrFail();
    }

    public function destroy(int $id)
    {
        $order = Order::find($id);
        $order->deleteOrFail();
    }
}
