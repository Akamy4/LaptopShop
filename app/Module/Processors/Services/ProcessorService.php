<?php

declare(strict_types=1);

namespace App\Module\Processors\Services;

use App\Module\Processors\Models\Processor;
use App\Module\Processors\Services\Contracts\ProcessorServiceInterface;
use Illuminate\Http\Request;

class ProcessorService implements ProcessorServiceInterface
{
    public function getAll(Request $request)
    {
        return Processor::query()
            ->orderByDesc('id')
            ->get();
    }

    public function getById($id)
    {
        return Processor::findOrFail($id);
    }
}
