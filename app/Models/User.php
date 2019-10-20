<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use SoftDeletes;
    protected $table = 'users';

    protected $fillable = ['name', 'phone', 'password', 'email', 'role', 'type'];

    CONST TYPE_USER = 1;
    CONST TYPE_TEACHER = 2;

    CONST ROLE_ADMIN = 1;
}
