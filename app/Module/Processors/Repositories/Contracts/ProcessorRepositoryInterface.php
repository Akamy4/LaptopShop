<?php

namespace App\Module\Processors\Repositories\Contracts;

use App\Module\Processors\Models\Processor;

interface ProcessorRepositoryInterface
{
    public function create(Processor $model);

    public function update(Processor $model);

    public function delete($id);
}
