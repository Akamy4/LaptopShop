<?php

declare(strict_types=1);

namespace App\Module\Models\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 */
final class Models extends Model
{
    use SoftDeletes;

    protected $table = 'models';

    protected $fillable = [
        'title',
        ];
}
