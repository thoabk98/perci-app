<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OfferItem extends Model
{
    //use SoftDeletes;
    protected $table = 'offer_items';

    protected $fillable = ['offer_id', 'offer_product_id'];
}
