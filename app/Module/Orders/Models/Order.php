<?php

declare(strict_types=1);

namespace App\Module\Orders\Models;

use App\Module\Users\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $total_price
 * @property-read OrderItem $orderItem
 */
final class Order extends Model
{
    use SoftDeletes;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'total_price'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function orderItem(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
