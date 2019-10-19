<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;
    protected $table = 'offers';

    protected $fillable = ['base_product_id', 'type', 'position', 'content', 'customer_template_id'];

    const UPSELL = 1;
    const CROSSSELL = 2;

    const ADD_TO_CART = 1;
    const BEFORE_CHECKOUT = 2;
    const AFTER_CHECKOUT = 3;
}
