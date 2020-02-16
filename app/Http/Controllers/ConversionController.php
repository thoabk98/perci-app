<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversionController extends AdminController
{
  private $actionType = [
    1 => 'openOfferPopup',
    2 => 'popupAddToCart'
  ];

  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'offer_id' => 'required',
      'type' => 'required'
    ]);

    $type = array_search($validatedData['type'], $this->actionType);
    if ($type) {
      try {
        $validatedData['type'] = $type;
        DB::table('conversions')->insert($validatedData);
        return $this->response(true, '', []);
      } catch (Exception $e) {
        return $this->response(false, $e->getMessage(), []);
      }
    }
    return $this->response(false, 'action not found', []);
  }
}
