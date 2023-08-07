<?php

declare(strict_types=1);

namespace App\Module\Processors\Repositories;

use App\Module\Processors\Models\Processor;
use App\Module\Processors\Repositories\Contracts\ProcessorRepositoryInterface;

final class ProcessorRepository implements ProcessorRepositoryInterface
{
    public function create(Processor $model)
    {
        $model->saveOrFail();
    }

    public function update(Processor $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = Processor::find($id);
        return $model->deleteOrFail();
    }
}
