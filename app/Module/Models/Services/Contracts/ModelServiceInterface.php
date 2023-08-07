<?php

namespace App\Module\Models\Services\Contracts;

use Illuminate\Http\Request;

interface ModelServiceInterface
{
    public function getAll(Request $request);

    public function getById($id);
}
