<?php

declare(strict_types=1);


namespace App\Module\Brands\Resources;

use App\Module\Brands\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property-read Brand $resource
 */
final class BrandResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
          'id' => $this->resource->id,
          'title' => $this->resource->title,
        ];
    }
}
