<?php

declare(strict_types=1);


namespace App\Module\Type\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class TypesResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'data' => TypeResource::collection($this->resource)
        ];
    }
}
