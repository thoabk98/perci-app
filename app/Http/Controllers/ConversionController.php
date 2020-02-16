<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ConversionRepository;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Helper\Helper;
use Exception;

class ConversionController extends AdminController
{
	private $conversionRepository;
  private $offerRepository;
  
  private $actionType = [
    0 => 'none',
    1 => 'openOfferPopup',
    2 => 'popupAddToCart'
  ];

	public function __construct(ConversionRepository $conversionRepository, OfferRepository $offerRepository)
	{
		$this->conversionRepository = $conversionRepository;
		$this->offerRepository = $offerRepository;
  }

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

	public function getUserConversions(Request $request)
	{
    $userId = Auth::id();
		$offers = $this->offerRepository->findAllBy("user_id", $userId)->toArray();

    $offerIds = collect($offers)->pluck("id");
    
		$conversions = $this->conversionRepository->findAllWhereIn("offer_id", $offerIds)->toArray();
		for($i = 0; $i < count($conversions); ++$i) {
			$conversions[$i]['time'] = Helper::parseDate($conversions[$i]['time']);
		}

		return $conversions;
	}
}