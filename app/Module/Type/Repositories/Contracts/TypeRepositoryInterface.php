<?php

namespace App\Module\Type\Repositories\Contracts;

use App\Module\Type\Models\Type;

interface TypeRepositoryInterface
{
    public function create(Type $model);

    public function update(Type $model);

    public function delete($id);
}
