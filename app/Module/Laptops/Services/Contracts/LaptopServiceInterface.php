<?php

namespace App\Module\Laptops\Services\Contracts;

use App\Module\Laptops\Models\Laptop;
use Illuminate\Http\Request;

interface LaptopServiceInterface
{
    public function getAll(Request $request);

    public function getById($id): Laptop;
}
