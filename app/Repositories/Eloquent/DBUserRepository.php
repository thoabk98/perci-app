<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\UserRepository;

class DBUserRepository extends DBRepository implements UserRepository
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }

    public function allUser($type, $cols = ['*'])
    {
        return $this->model->where('type', $type)->get($cols);
    }

    public function userPaginate($type, $per=10)
    {
        return $this->model->where('type', $type)->orderBy('id', 'desc')->paginate($per);
    }

    public function user($user_id = 1, $cols = ['*'])
    {
        return User::where('id', $user_id)->get($cols);
    }
}