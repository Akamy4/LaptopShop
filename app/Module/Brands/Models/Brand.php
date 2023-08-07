<?php

declare(strict_types=1);

namespace App\Module\Brands\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string title
 */
final class Brand extends Model
{
    use SoftDeletes;
    protected $table = 'brands';

    protected $fillable = [
        'title',
        ];
}
