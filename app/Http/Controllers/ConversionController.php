<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ConversionRepository;
use App\Repositories\OfferRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Helper\Helper;
use Exception;

class ConversionController extends Controller
{
	private $conversionRepository;
	private $offerRepository;

	public function __construct(ConversionRepository $conversionRepository, OfferRepository $offerRepository)
	{
		$this->conversionRepository = $conversionRepository;
		$this->offerRepository = $offerRepository;
	}

	public function getUserConversions(Request $request)
	{
		$userId = Auth::id();
		$offers = $this->offerRepository->findAllBy("user_id", $userId)->toArray();

		$offerIds = array();

		for($i = 0; $i < count($offers); ++$i) {
			array_push($offerIds, $offers[$i]["id"]);
		}

		$conversions = $this->conversionRepository->findAllWhereIn("offer_id", $offerIds)->toArray();
		for($i = 0; $i < count($conversions); ++$i) {
			$conversions[$i]['time'] = Helper::parseDate($conversions[$i]['time']);
		}

		return $conversions;
	}
}
