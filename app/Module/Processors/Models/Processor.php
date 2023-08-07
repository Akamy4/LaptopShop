<?php

declare(strict_types=1);

namespace App\Module\Processors\Models;

use App\Module\Brands\Models\Brand;
use App\Module\Models\Models\Models;
use App\Module\Type\Models\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property int $brand_id
 * @property int $type_id
 * @property int $model_id
 * @property float $frequency
 * @property integer $core
 * @property integer $thread
 * @property-read Brand $brand
 * @property-read Type $type
 * @property-read Models $model
 */
final class Processor extends Model
{
    use SoftDeletes;

    protected $table = 'processors';

    protected $fillable = [
        'brand_id',
        'type_id',
        'model_id',
        'frequency',
        ];

    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Models::class, 'model_id');
    }
}
