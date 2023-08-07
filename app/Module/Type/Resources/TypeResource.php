<?php

declare(strict_types=1);


namespace App\Module\Type\Resources;

use App\Module\Type\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Type $resource
 */
final class TypeResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
          'id' => $this->resource->id,
          'title' => $this->resource->title,
        ];
    }
}
