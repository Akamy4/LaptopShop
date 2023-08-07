<?php

declare(strict_types=1);

namespace App\Module\Laptops\Repositories;

use App\Module\Laptops\Models\Laptop;
use App\Module\Laptops\Repositories\Contracts\LaptopRepositoryInterface;

final class LaptopRepository implements LaptopRepositoryInterface
{
    public function create(Laptop $model)
    {
        $model->saveOrFail();
    }

    public function update(Laptop $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = Laptop::find($id);
        return $model->deleteOrFail();
    }
}
