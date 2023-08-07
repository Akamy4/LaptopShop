<?php

namespace App\Module\Brands\Services\Contracts;


use Illuminate\Http\Request;

interface BrandServiceInterface
{
    public function getAll(Request $request);

    public function getById($id);
}
