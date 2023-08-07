<?php

declare(strict_types=1);


namespace App\Module\Brands\Repositories;

use App\Module\Brands\Models\Brand;
use App\Module\Brands\Repositories\Contracts\BrandRepositoryInterface;

final class BrandRepository implements BrandRepositoryInterface
{
    public function create(Brand $model)
    {
        $model->saveOrFail();
    }

    public function update(Brand $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = Brand::find($id);
        return $model->deleteOrFail();
    }
}
