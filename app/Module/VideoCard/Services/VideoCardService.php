<?php

declare(strict_types=1);


namespace App\Module\VideoCard\Services;

use App\Module\VideoCard\Models\VideoCard;
use App\Module\VideoCard\Services\Contracts\VideoCardServiceInterface;
use Illuminate\Http\Request;

class VideoCardService implements VideoCardServiceInterface
{
    public function getAll(Request $request)
    {
        return VideoCard::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById($id)
    {
        return VideoCard::findOrFail($id);
    }
}
