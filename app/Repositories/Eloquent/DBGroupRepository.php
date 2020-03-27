<?php

namespace App\Repositories\Eloquent;

use App\Models\Group;
use App\Repositories\GroupRepository;

class DBGroupRepository extends DBRepository implements GroupRepository
{
  public function __construct(Group $model)
  {
    parent::__construct($model);
  }

  public function getUserGroups($user_id, $column = ['*'], $perPage = '4', $currentPage = '0')
  {
    $groups = Group::where('user_id', $user_id)->paginate($perPage, $column);
    return $groups;
  }

  public function handleStoreUpdate($user_id, array $data, $group_id = null)
  {
    $data['status'] = $data['status'] ? $data['status'] : true;
    $data['user_id'] = $user_id;

    $this->store($data, $group_id);
  }
}
