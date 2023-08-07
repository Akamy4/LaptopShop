<?php

namespace App\Module\Orders\Repositories\Contracts;

use App\Module\Orders\Models\OrderItem;

interface OrderItemRepositoryInterface
{
    public function create(OrderItem $model);

    public function update(OrderItem $model);

    public function destroy(int $id);
}
