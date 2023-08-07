<?php

declare(strict_types=1);

namespace App\Module\WriteOff\Resources;

use App\Module\WriteOff\Models\WriteOffItem;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *
 *     @OA\Property(property="id",type="int"),
 *     @OA\Property(property="inventoryItemId",type="integer"),
 *     @OA\Property(property="inventoryItemName",type="string"),
 *     @OA\Property(property="amount",type="integer"),
 * )
 * @property WriteOffItem $resource
 */
final class WriteOffItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'                => $this->resource->id,
            'inventoryItemId'   => $this->resource->inventory_item_id,
            'inventoryItemName' => $this->resource->inventoryItem->name,
            'amount'            => $this->resource->amount,
        ];
    }
}
