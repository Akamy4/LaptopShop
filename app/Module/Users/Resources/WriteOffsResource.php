<?php

declare(strict_types=1);

namespace App\Module\WriteOff\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class WriteOffsResource.
 *
 * @package namespace App\Module\Inventory\Resources;
 */
final class WriteOffsResource extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => WriteOffResource::collection($this->resource)
        ];
    }
}
