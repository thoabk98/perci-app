<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\OfferLib;
use App\Models\Offer;
use Illuminate\Support\Facades\Log;
use App\Repositories\OfferRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
	private $offerRepository;
	private $userRepository;

	public function __construct(OfferRepository $offerRepository, UserRepository $userRepository)
	{
		$this->offerRepository = $offerRepository;
		$this->userRepository = $userRepository;
	}

	public function testApi()
	{
		$merchant = array(
			'client_id' => 'trd1fs9hkwj5qg1ko009sc78gp3fpfl',
			'auth_token' => 'p5oj5sf04im8os9s6l4xvg2jdd4f6lr',
			'store_hash' => '459zlh8ulo'
		);
		// $products = OfferLib::getProductList($merchant);

		$regions = OfferLib::getThemeRegions($merchant);

		$template = [
			"name" => "Storefront modal",
			"template" => "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
				<button type='button' class='hidden trigger-upsell-modal-btn' data-toggle='modal' data-target='.peasi-ult-upsell-modal'></button><div class='modal fade bd-example-modal-lg peasi-ult-upsell-modal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'><div class='modal-dialog modal-lg store-popup'></div></div>",
		];
		$template = json_encode($template);
		$widgetTemplate = OfferLib::createWidgetTemplate($merchant, $template);
		$widgetTemplateUuid = $widgetTemplate['uuid'];

		$widget = [
			"name" => "Storefront modal",
			"widget_configuration" => json_decode("{}"),
			"widget_template_uuid" => $widgetTemplateUuid
		];
		$widgetConfig = json_encode($widget);
		$widget = OfferLib::createWidget($merchant, $widgetConfig);
		$widgetUuid = $widget['uuid'];

		$placement = [
			"widget_uuid" => $widgetUuid,
			"template_file" => "pages/product",
			"status" => "active",
			"region" => end($regions)['name']
		];
		$placementConfig = json_encode($placement);
		$placement = OfferLib::createPlacement($merchant, $placementConfig);

		dd($placement);

		return 'Product list';
	}

	public function index(Request $request)
	{
		// $merchant = array(
		// 	'client_id' => 'trd1fs9hkwj5qg1ko009sc78gp3fpfl',
		// 	'auth_token' => 'p5oj5sf04im8os9s6l4xvg2jdd4f6lr',
		// 	'store_hash' => '459zlh8ulo'
		// );

		if(!Auth::check())
			return response()->json([], 401);
		$userId = Auth::id();
		

		$merchantInfo = $this->userRepository->user($userId, ['client_id', 'auth_token', 'store_hash']);
		$userOffers = $this->offerRepository->getAllUserOffer($userId, ['base_product_id']);
		$offers = array();
		foreach($userOffers as $userOffer) {
			array_push($offers, $userOffer['base_product_id']);
		}
		$params = array(
			"id:in" => implode(',', $offers),
		);
		$products = OfferLib::getProductList($merchantInfo->toArray()[0], $params);
		$offers = array();
		foreach ($products as $product) {
			$item = [
				'name' => $product->name,
                'address' => 'No. 189, Grove St, Los Angeles',
                'group_name' => 'Group Name',
                'date' => '2016-05-02',
                'cvs_rate' => '35%',
                'aov' => '$234.04',
                'views' => 142,
			];
			array_push($offers, $item);
		}
		
		return response()->json(['pageInfo' => $userOffers, 'data' => $offers], 200);
	}

	public function store(Request $request)
	{
		$data = $request->all();

		$offer = new Offer;
		$offer->user_id = 1;
		$offer->base_product_id = 77;
		$offer->type = $data["type"];
		$offer->position = $data["position"];
		$offer->content = json_encode($data["content"]);
		$offer->save();

		return $data;
		// $data = array_merge($data, [
		//     'start_time' => Helper::formatDate($data['start_time']),
		//     'end_time' => Helper::formatDate($data['end_time']),
		//     'exam_time' => Helper::formatDate($data['exam_time']),
		//     'exam_end_time' => Helper::formatDate($data['exam_end_time'])
		// ]);
		// try {
		//     $this->courseRepository->store($data);
		//     return $this->response(true, 'thêm mới thành công');
		// } catch(\Exception $ex) {
		//     Log::error('Create new item: fail. message: '.$ex->getMessage().'. file: '.$ex->getFile().'. line: '.$ex->getLine());
		//     return $this->response(false, 'thêm mới không thành công');
		// }
	}
}
