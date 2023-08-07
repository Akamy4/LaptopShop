<?php

namespace App\Module\Processors\Services\Contracts;

use Illuminate\Http\Request;

interface ProcessorServiceInterface
{
    public function getAll(Request $request);

    public function getById($id);
}
