<?php

namespace App\Module\Type\Services\Contracts;


use Illuminate\Http\Request;

interface TypeServiceInterface
{
    public function getAll(Request $request);

    public function getById($id);
}
