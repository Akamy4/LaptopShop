<?php

declare(strict_types=1);


namespace App\Module\Type\Services;

use App\Module\Type\Models\Type;
use App\Module\Type\Services\Contracts\TypeServiceInterface;
use Illuminate\Http\Request;

class TypeService implements TypeServiceInterface
{
    public function getAll(Request $request)
    {
        return Type::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById($id)
    {
        return Type::findOrFail($id);
    }
}
