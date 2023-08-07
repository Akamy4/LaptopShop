<?php

declare(strict_types=1);

namespace App\Module\Users\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property int $id
 * @property string name
 * @property string surname
 * @property string email
 * @property string password
 * @property string address
 * @property string phone
 * @property int role
 */
final class User extends Model implements Authenticatable
{
    use HasApiTokens;
    use SoftDeletes;

    protected $table = 'users';

    protected $fillable = ['name', 'surname', 'email', 'password', 'address', 'phone'];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->id;
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
}
