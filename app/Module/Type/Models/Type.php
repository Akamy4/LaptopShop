<?php

declare(strict_types=1);

namespace App\Module\Type\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id
 * @property string $title
 */
final class Type extends Model
{
    use SoftDeletes;

    protected $table = 'types';

    protected $fillable = [
        'title',
        ];
}
