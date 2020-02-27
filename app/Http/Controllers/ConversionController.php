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
    private $conversion;

    public function __construct(ConversionRepository $conversionRepository, OfferRepository $offerRepository, Conversion $conversion)
    {
        $this->conversionRepository = $conversionRepository;
        $this->offerRepository = $offerRepository;
        $this->conversion = $conversion;
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'offer_id' => 'required',
            'type' => 'required'
        ]);

        try {
            $this->conversion->insert(Conversion::createRecord($validatedData));
            return $this->response(true, '', []);
        } catch (Exception $e) {
            return $this->response(false, $e->getMessage(), []);
        }
    }

    public function getUserConversions(Request $request)
    {
        $userId = Auth::id();

        $conversions = $this->conversion->whereIn("offer_id", function ($query) use ($userId){
            $query->select("id")->from("offers")->where("user_id", $userId);
        })->get();

        foreach ($conversions as $key => $value){
            $conversions[$key]->time = Helper::parseDate($value->time);
        }

        return $conversions;
    }
}