<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use SoftDeletes;
    protected $table = 'users';

    protected $fillable = ['name', 'phone', 'email', 'role', 'type'];

    CONST TYPE_USER = 1;
    CONST TYPE_TEACHER = 2;

    CONST ROLE_ADMIN = 1;
}
