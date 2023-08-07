<?php

namespace App\Module\VideoCard\Repositories\Contracts;

use App\Module\VideoCard\Models\VideoCard;

interface VideoCardRepositoryInterface
{
    public function create(VideoCard $model);

    public function update(VideoCard $model);

    public function delete($id);
}
