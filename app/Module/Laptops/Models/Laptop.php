<?php

declare(strict_types=1);

namespace App\Module\Laptops\Models;

use App\Module\Brands\Models\Brand;
use App\Module\Models\Models\Models;
use App\Module\Processors\Models\Processor;
use App\Module\VideoCard\Models\VideoCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 * @property int $brand_id
 * @property int $processor_id
 * @property int $video_card_id
 * @property int $ram_memory
 * @property int $memory
 * @property float $diagonal
 * @property string $screen_resolution
 * @property int $price
 * @property int $quantity
 * @property string $image
 * @property-read Brand $brand
 * @property-read Processor $processor
 * @property-read VideoCard $videoCard
 *
 */
final class Laptop extends Model
{
    use SoftDeletes;

    protected $table = 'laptops';

    protected $fillable = [
        'title',
        'processor_id',
        'video_card_id',
        'brand_id',
        'ram_memory',
        'memory',
        'diagonal',
        'screen_resolution',
        'price',
        'quantity',
        ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function processor(): BelongsTo
    {
        return $this->belongsTo(Processor::class, 'processor_id');
    }

    public function videoCard(): BelongsTo
    {
        return $this->belongsTo(VideoCard::class, 'video_card_id');
    }
}
