<?php
namespace App\Repositories\Eloquent;

use App\Models\UserLogin;
use App\Repositories\UserLoginRepository;
use Illuminate\Support\Facades\Auth;

class DBUserLoginRepository extends DBRepository implements UserLoginRepository
{
    public function __construct(UserLogin $model)
    {
        parent::__construct($model);
    }

    public function storeUser(array $data, int $type)
    {
        $dataUser = [
            'user_id'   => $data['user_id'],
            'type'  => $type
        ];
        $user = $this->model->firstOrNew($dataUser);
        $user->fill([
            'loginID' => $data['loginID'],
            'password'  => bcrypt('12345678')
        ])->save();

    }

    public function findUserLogin($user_id, $type)
    {
        return $this->model->where('user_id', $user_id)->where('type', $type)->first();
    }

    public function updateAccountLogin(array $data)
    {
        $user = Auth::user();
        if (isset($data['password'])) {
            $user->password = bcrypt($data['password']);
        }
        if (isset($data['loginID'])) {
            $user->loginID = $data['loginID'];
        }
        $user->save();
    }
}
