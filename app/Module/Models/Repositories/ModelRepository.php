<?php

declare(strict_types=1);


namespace App\Module\Models\Repositories;

use App\Module\Models\Models\Models;
use App\Module\Models\Repositories\Contracts\ModelRepositoryInterface;

final class ModelRepository implements ModelRepositoryInterface
{
    public function create(Models $model)
    {
        $model->saveOrFail();
    }

    public function update(Models $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = Models::find($id);
        return $model->deleteOrFail();
    }
}
