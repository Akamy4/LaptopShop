<?php

declare(strict_types=1);


namespace App\Module\Brands\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class BrandsResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'data' => BrandResource::collection($this->resource)
        ];
    }
}
