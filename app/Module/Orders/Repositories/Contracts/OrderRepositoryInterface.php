<?php

namespace App\Module\Orders\Repositories\Contracts;

use App\Module\Orders\Models\Order;

interface OrderRepositoryInterface
{
    public function create(Order $model);

    public function update(Order $model);

    public function destroy(int $id);
}
