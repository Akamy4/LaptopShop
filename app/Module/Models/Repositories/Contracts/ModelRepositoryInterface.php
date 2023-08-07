<?php

declare(strict_types=1);


namespace App\Module\Models\Repositories\Contracts;

use App\Module\Models\Models\Models;

interface ModelRepositoryInterface
{
    public function create(Models $model);

    public function update(Models $model);

    public function delete($id);
}
