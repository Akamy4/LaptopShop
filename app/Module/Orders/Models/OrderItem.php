<?php

declare(strict_types=1);

namespace App\Module\Orders\Models;

use App\Module\Laptops\Models\Laptop;
use App\Module\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $order_id
 * @property int $laptop_id
 * @property int $quantity
 * @property int $unit_price
 */
final class OrderItem extends Model
{
    use SoftDeletes;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'laptop_id',
        'quantity',
        'unit_price',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function laptop(): BelongsTo
    {
        return $this->belongsTo(Laptop::class, 'laptop_id');
    }
}
