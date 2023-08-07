<?php

declare(strict_types=1);

namespace App\Module\WriteOff\Resources;

use App\Module\WriteOff\Models\WriteOff;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *
 *     @OA\Property(property="id",type="int"),
 *     @OA\Property(property="warehouseId",type="integer"),
 *     @OA\Property(property="warehouseName",type="string"),
 *     @OA\Property(property="writeOffTypeId",type="integer"),
 *     @OA\Property(property="writeOffTypeName",type="string"),
 *     @OA\Property(property="additionalServiceTypeId",type="integer"),
 *     @OA\Property(property="additionalServiceTypeName",type="string"),
 *     @OA\Property(property="invoiceNumber",type="string"),
 *     @OA\Property(property="code1C",type="string"),
 *     @OA\Property(property="writeOffItems",
 *            type="array",
 *            @OA\Items(
 *                       @OA\Property(property="id",type="int"),
 *                       @OA\Property(property="inventoryItemId",type="integer"),
 *                       @OA\Property(property="inventoryItemName",type="string"),
 *                       @OA\Property(property="amount",type="integer"),
 *                  )
 *      ),
 * )
 * @property WriteOff $resource
 */
final class WriteOffResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'                        => $this->resource->id,
            'warehouseId'               => $this->resource->warehouse_id,
            'warehouseName'             => $this->resource->warehouse->name,
            'writeOffTypeId'            => $this->resource->write_off_type_id,
            'writeOffTypeName'          => $this->resource->writeOffType->title,
            'additionalServiceTypeId'   => $this->resource->additional_service_type_id,
            'additionalServiceTypeName' => $this->resource->additionalServiceType->title,
            'invoiceNumber'             => $this->resource->invoice_number,
            'code1C'                    => $this->resource->code_1C,
            'writeOffItems'             => WriteOffItemResource::collection($this->resource->writeOffItems)
        ];
    }
}
