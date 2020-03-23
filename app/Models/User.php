<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    protected $table = 'users';

    protected $fillable = ['name', 'admin', 'phone', 'password', 'email', 'role', 'type', 'client_id', 'client_secret', 'store_hash', 'auth_token'];

    CONST TYPE_USER = 1;
    CONST TYPE_TEACHER = 2;

    CONST ROLE_ADMIN = 1;
}
