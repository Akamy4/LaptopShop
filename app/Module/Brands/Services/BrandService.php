<?php

declare(strict_types=1);

namespace App\Module\Brands\Services;

use App\Module\Brands\Models\Brand;
use App\Module\Brands\Services\Contracts\BrandServiceInterface;
use Illuminate\Http\Request;

class BrandService implements BrandServiceInterface
{
    public function getAll(Request $request)
    {
        return Brand::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById($id)
    {
        return Brand::findOrFail($id);
    }
}
