<?php

namespace App\Module\VideoCard\Services\Contracts;

use Illuminate\Http\Request;

interface VideoCardServiceInterface
{
    public function getAll(Request $request);

    public function getById($id);
}
