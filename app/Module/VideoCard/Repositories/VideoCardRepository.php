<?php

declare(strict_types=1);


namespace App\Module\VideoCard\Repositories;

use App\Module\VideoCard\Models\VideoCard;
use App\Module\VideoCard\Repositories\Contracts\VideoCardRepositoryInterface;

final class VideoCardRepository implements VideoCardRepositoryInterface
{
    public function create(VideoCard $model)
    {
        $model->saveOrFail();
    }

    public function update(VideoCard $model)
    {
        $model->updateOrFail();
    }

    public function delete($id)
    {
        $model = VideoCard::find($id);
        return $model->deleteOrFail();
    }
}
