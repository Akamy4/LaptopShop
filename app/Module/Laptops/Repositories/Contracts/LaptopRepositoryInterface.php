<?php

declare(strict_types=1);


namespace App\Module\Laptops\Repositories\Contracts;

use App\Module\Laptops\Models\Laptop;

interface LaptopRepositoryInterface
{
    public function create(Laptop $model);

    public function update(Laptop $model);

    public function delete($id);
}
