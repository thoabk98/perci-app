<?php

namespace App\Repositories;

interface GroupRepository
{
  public function getUserGroups($user_id, $column = ['*'], $perPage = '4', $currentPage = '0');

  public function handleStoreUpdate($user_id, array $data);
}
