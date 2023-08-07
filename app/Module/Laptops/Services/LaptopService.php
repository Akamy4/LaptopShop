<?php

declare(strict_types=1);


namespace App\Module\Laptops\Services;

use App\Module\Laptops\Models\Laptop;
use App\Module\Laptops\Services\Contracts\LaptopServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class LaptopService implements LaptopServiceInterface
{
    public function getAll(Request $request)
    {
        return Laptop::query()
            ->when($request->input('title'), fn(Builder $query) => $query->where('name', 'like', '%' . $request->input('title') . '%'))
            ->when($request->input('brandId'), fn(Builder $query) => $query->where('brand_id', $request->input('brandId')))
//            ->orderByDesc('id')
            ->paginate(2);
    }

    public function getById($id): Laptop
    {
        return Laptop::findOrFail($id);
    }
}
