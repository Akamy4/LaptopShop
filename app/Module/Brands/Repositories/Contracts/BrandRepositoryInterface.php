<?php

namespace App\Module\Brands\Repositories\Contracts;

use App\Module\Brands\Models\Brand;

interface BrandRepositoryInterface
{
    public function create(Brand $model);

    public function update(Brand $model);

    public function delete($id);
}
