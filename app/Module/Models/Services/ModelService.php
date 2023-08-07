<?php

declare(strict_types=1);


namespace App\Module\Models\Services;

use App\Module\Models\Models\Models;
use App\Module\Models\Services\Contracts\ModelServiceInterface;
use Illuminate\Http\Request;

class ModelService implements ModelServiceInterface
{
    public function getAll(Request $request)
    {
        return Models::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById($id)
    {
        return Models::findOrFail($id);
    }
}
