<?php

namespace App\Http\Controllers;

use App\Models\Conversion;
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

    try {
      DB::table('conversions')->insert(Conversion::createRecord($validatedData));
      return $this->response(true, '', []);
    } catch (Exception $e) {
      return $this->response(false, $e->getMessage(), []);
    }
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