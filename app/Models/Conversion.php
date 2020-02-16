<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversion extends Model
{
  protected $table = 'conversions';
  protected $fillable = ['offer_id', 'type'];

  const OPEN_OFFER_POPUP = 1;
  const POPUP_ADD_TO_CART = 2;

  public static function createRecord(array $conversionData)
  {
    return [
      'offer_id' => $conversionData['offer_id'],
      'type' => constant('self::' . $conversionData['type'])
    ];
  }
}
