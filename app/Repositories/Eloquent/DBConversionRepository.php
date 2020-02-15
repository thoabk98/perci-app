<?php

namespace App\Repositories\Eloquent;

use App\Models\Conversion;
use App\Repositories\ConversionRepository;

class DBConversionRepository extends DBRepository implements ConversionRepository
{
    public function __construct(Conversion $model)
    {
        parent::__construct($model);
    }
}