<?php

declare(strict_types=1);


namespace App\Module\Type\Repositories;

use App\Module\Type\Models\Type;
use App\Module\Type\Repositories\Contracts\TypeRepositoryInterface;

final class TypeRepository implements TypeRepositoryInterface
{
    public function create(Type $model)
    {
        $model->saveOrFail();
    }

    public function update(Type $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = Type::find($id);
        return $model->deleteOrFail();
    }
}
