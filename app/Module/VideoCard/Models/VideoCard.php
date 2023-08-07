<?php

declare(strict_types=1);

namespace App\Module\VideoCard\Models;

use App\Module\Brands\Models\Brand;
use App\Module\Models\Models\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $brand_id
 * @property int $model_id
 * @property float $frequency
 * @property int $memory
 */
final class VideoCard extends Model
{
    use SoftDeletes;

    protected $table = 'video_cards';

    protected $fillable = [
        'brand_id',
        'model_id',
        'frequency',
        'memory',
        ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Models::class, 'model_id');
    }
}
