<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
    protected $table = 'conversions';

    protected $fillable = ['time', 'type'];

    const TYPE_NONE = 0;
    const TYPE_CLICKED = 1;
    const TYPE_CHECKOUTSUCCEEDED = 2;
}
