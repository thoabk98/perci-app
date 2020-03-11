<?php

namespace App\Repositories;

interface OfferRepository
{
  public function getAllUserOffer($user_id = 1, $column = ['*'], $perPage = '4', $currentPage = '0');

  public function getUserOffer($user_id, $offer_id);
}
