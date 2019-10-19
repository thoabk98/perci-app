<?php

namespace App\Repositories\Eloquent;

use App\Models\Offer;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\DB;

class DBOfferRepository extends DBRepository implements OfferRepository
{
    public function __construct(Course $model)
    {
        parent::__construct($model);
    }

}
