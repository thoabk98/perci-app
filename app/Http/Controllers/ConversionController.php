<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConversionController extends AdminController
{
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'offer_id' => 'required',
      'type' => 'required'
    ]);

    try {
      DB::table('conversions')->insert(Conversion::createRecord($validatedData));
      return $this->response(true, '', []);
    } catch (Exception $e) {
      return $this->response(false, $e->getMessage(), []);
    }
  }
}
