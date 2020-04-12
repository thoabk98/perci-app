<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\OfferLib;
use App\Models\Offer;
use Illuminate\Support\Facades\Log;
use App\Repositories\OfferRepository;
use App\Repositories\UserRepository;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    $user = auth()->user();
    $offer_lib = new OfferLib($user);
    // $products = OfferLib::getProductList($merchant);

    $regions = $offer_lib->getThemeRegions();
    dd($regions);

    $style = "<style>.ult-upsell *{box-sizing:border-box;line-height:1.5}.ult-upsell.modal{visibility:visible;z-index:1050;width:auto;display:none;overflow-y:auto;outline:0;border:1px solid rgba(0,0,0,.2);border-radius:1rem}.ult-upsell.fade{opacity:0;transition:opacity .15s linear}.ult-upsell.fade.show{opacity:1}.ult-upsell .popup-modal-dialog{position:relative;width:auto;margin:.5rem;pointer-events:none;transform:translate(0,0);transition:transform .3s ease-out,-webkit-transform .3s ease-out}.ult-upsell .popup-modal-content{position:relative;display:flex;flex-direction:column;width:100%;pointer-events:auto;background-color:#fff;background-clip:padding-box;outline:0}.ult-upsell .popup-modal-body{position:relative;flex:1 1 auto;padding:1rem}.ult-upsell .popup-title{padding:1.5rem 3rem 0;font-size:1.75rem}.ult-upsell .popup-des{padding:.5rem 3rem 0}.ult-upsell .popup-content{margin:auto 0;padding:3rem 1.5rem}.ult-upsell .popup-content .left-container{padding-left:1.5rem;padding-bottom:1.5rem;text-align:left}.ult-upsell .popup-content .left-container img{border:1px solid #6c757d}.ult-upsell .popup-content .right-container{padding-left:1.5rem;padding-bottom:1.5rem;text-align:left}.ult-upsell .popup-content h4{margin:0}.ult-upsell .popup-content .info{padding-bottom:1.5rem;margin:0}.ult-upsell .popup-content .name{padding-top:.25rem}.ult-upsell .popup-content .price{padding-top:1rem;padding-bottom:1rem}.ult-upsell .popup-content .color{padding-bottom:.25rem}.ult-upsell .popup-content .add-to-cart{color:#fff;font-weight:700;background-color:#28a745}.ult-upsell .popup-content .add-to-cart:hover{color:#fff;background-color:#1e7e34;border-color:#1c7430}.ult-upsell ul{list-style-type:none}.ult-upsell .round-border{border-radius:.75rem!important}.ult-upsell .color-picker{width:20px;height:20px;padding:0!important;margin-right:.5rem;border-radius:50%}.ult-upsell .flex{display:flex;flex-wrap:wrap}.ult-upsell .inline{display:inline-block}.ult-upsell .popup-button{display:inline-block;text-align:center;vertical-align:middle;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out}.modal-backdrop{position:fixed;top:0;right:0;bottom:0;left:0;z-index:1040;background-color:#000}.modal-backdrop.fade{opacity:0}.modal-backdrop.show{opacity:.5}@media (min-width:576px){.ult-upsell .popup-modal-dialog{max-width:500px}}@media (min-width:992px){.ult-upsell .column{flex:0 0 50%;padding-right:15px;padding-left:15px;width:50%}.ult-upsell .popup-modal-lg{max-width:800px}}</style>";

    $template = [
      "name" => "Storefront modal",
      // "template" => "<link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\" integrity=\"sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u\" crossorigin=\"anonymous\">
      // 	<button type='button' class='hidden trigger-upsell-modal-btn' data-toggle='modal' data-target='.peasi-ult-upsell-modal'></button><div class='modal fade bd-example-modal-lg peasi-ult-upsell-modal' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'><div class='modal-dialog modal-lg store-popup'></div></div>",
      // "template" => "<link rel=\"stylesheet\" href=\"http://peasisoft.com/landingpage/css/popup.css\" type=\"text/css\" media=\"all\" /><div id=\"popup-modal\" class=\"ult-upsell modal fade bd-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog popup-modal-dialog popup-modal-lg\"><div class=\"popup-modal-content\"><div class=\"popup-modal-body\"><div class=\"popup-title\"><h3>LIMITED TIME OFFER!</h3></div><div class=\"popup-des\">Add these Items and Save</div><div class=\"flex popup-content\"><div class=\"column left-container \"><img class=\"round-border\" width=\"290\" src=\"http://peasisoft.com/landingpage/images/g3.jpg\" class=\"img-fluid\" alt=\"\" /></div><div class=\"column right-container \"><h4>Apple Macbook Pro</h4><ul class=\"info\"><li class=\"name\">Laptop - Classic Rose</li><li class=\"price\"><s style=\"color: #6c757d;\">$990.00</s><span style=\"color: #28a745; margin-left: 1rem;\">$890.00</span></li><li class=\"color\">Colors</li><ul><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li></ul></ul><button type=\"button\" class=\"add-to-cart popup-button round-border column\">Add to cart</button></div></div></div></div></div></div>"
      // "template" => "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css\" integrity=\"sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T\" crossorigin=\"anonymous\"><div id=\"popup-modal\" class=\"ult-upsell modal fade bd-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog popup-modal-dialog popup-modal-lg\"><div class=\"popup-modal-content\"><div class=\"popup-modal-body\"><div class=\"popup-title\"><h3>LIMITED TIME OFFER!</h3></div><div class=\"popup-des\">Add these Items and Save</div><div class=\"flex popup-content\"><div class=\"column left-container \"><img class=\"round-border\" width=\"290\" src=\"http://peasisoft.com/landingpage/images/g3.jpg\" class=\"img-fluid\" alt=\"\" /></div><div class=\"column right-container \"><h4>Apple Macbook Pro</h4><ul class=\"info\"><li class=\"name\">Laptop - Classic Rose</li><li class=\"price\"><s style=\"color: #6c757d;\">$990.00</s><span style=\"color: #28a745; margin-left: 1rem;\">$890.00</span></li><li class=\"color\">Colors</li><ul><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li></ul></ul><button type=\"button\" class=\"add-to-cart popup-button round-border column\">Add to cart</button></div></div></div></div></div></div>"
      "template" => $style . "<div id=\"popup-modal\" class=\"ult-upsell modal fade bd-example-modal-lg\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myLargeModalLabel\" aria-hidden=\"true\"><div class=\"modal-dialog popup-modal-dialog popup-modal-lg\"><div class=\"popup-modal-content\"><div class=\"popup-modal-body\"><div class=\"popup-title\"><h3>LIMITED TIME OFFER!</h3></div><div class=\"popup-des\">Add these Items and Save</div><div class=\"flex popup-content\"><div class=\"column left-container \"><img class=\"round-border\" width=\"290\" src=\"http://peasisoft.com/landingpage/images/g3.jpg\" class=\"img-fluid\" alt=\"\" /></div><div class=\"column right-container \"><h4>Apple Macbook Pro</h4><ul class=\"info\"><li class=\"name\">Laptop - Classic Rose</li><li class=\"price\"><s style=\"color: #6c757d;\">$990.00</s><span style=\"color: #28a745; margin-left: 1rem;\">$890.00</span></li><li class=\"color\">Colors</li><ul><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li><li class=\"inline\"><button type=\"button\" class=\"color-picker popup-button\"></button></li></ul></ul><button type=\"button\" class=\"add-to-cart popup-button round-border column\">Add to cart</button></div></div></div></div></div></div>"
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
      "region" => $regions[0]['name']
    ];
    $placementConfig = json_encode($placement);
    $placement = OfferLib::createPlacement($merchant, $placementConfig);

    // $thumbnailUrl = OfferLib::getProductThumbnailUrl($merchant, $products[0]->id);

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

    $userId = Auth::id();

    $merchantInfo = $this->userRepository->findById($userId, ['client_id', 'auth_token', 'store_hash']);

    $userOffers = $this->offerRepository->getAllUserOffer($userId, ['*']);

    $returnOffers = array();
    foreach ($userOffers as $offer) {
      $offer['address'] = 'No. 189, Grove St, Los Angeles';
      $offer['group_name'] = 'Group Name';
      $offer['date'] = '2016-05-02';
      $offer['cvs_rate'] = '35%';
      $offer['aov'] = '$234.04';
      $offer['views'] = 142;
    }

    return response()->json(['pageInfo' => $userOffers, 'data' => $userOffers], 200);
  }

  public function store(Request $request)
  {
    // $data = [
    // 	'content' => json_encode($request->content),
    // 	'client_id' => Auth::id(),
    // 	'positon' => $request->position,
    // 	'type' => $request->type,
    // 	'custom_template_id' => $request->custom_template_id,
    // ];
    $data = [];
    foreach ($request->offer_product_id as $key => $id) {
      array_push($data, array(
        'user_id' => Auth::id(),
        'name' => $request->name,
        'base_product_id' => $id,
        'type' => $request->type,
        'position' => $request->position,
        'content' => json_encode($request->content),
        'customer_template_id' => $request->customer_template_id
      ));
    }

    try {
      DB::table("offers")->insert($data);
      return response()->json(['status' => true, 'message' => 'insert success'], 201);
    } catch (Exception $e) {
      return response()->json(['status' => false, 'message' => 'insert failed ' . $e->getMessage()], 500);
    }

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

  public function delete(Request $request, $offer_id)
  {
    $offer = $this->offerRepository->getUserOffer(Auth::id(), $offer_id);
    if(!$offer) {
      return response()->json(['status' => false, 'message' => 'Inaccessable data'], 500);
    }
    try {
      $offer->delete();
      return response()->json(['status' => true, 'message' => "Delete success"], 200);
    } catch (Exception $e) {
      Log::error('remove offer: fail. message: '.$e->getMessage().'. file: '.$e->getFile().'. line: '.$e->getLine());
      return response()->json(['status' => false, 'message' => 'Delete failed '], 500);
    }
  }

  public function update(Request $request, $offer_id)
  {
    $offer = $this->offerRepository->getUserOffer(Auth::id(), $offer_id);
    if(!$offer_id) {
      return response()->json(['status' => false, 'message' => 'Inaccessable data'], 500);
    }
    try {
      $updateParams = $request->only(['base_product_id', 'type', 'position', 'content', 'customer_template_id']);
      $offer->update($updateParams);
      return response()->json(['status' => true, 'message' => "Update success"], 200);
    } catch (Exception $e) {
      Log::error('update offer: fail. message: '.$e->getMessage().'. file: '.$e->getFile().'. line: '.$e->getLine());
      return response()->json(['status' => false, 'message' => 'Update failed '], 500);
    }
  }

  public function duplicate(Request $request, $offer_id)
  {
    $offer = $this->offerRepository->getUserOffer(Auth::id(), $offer_id);
    if(!$offer_id) {
      return response()->json(['status' => false, 'message' => 'Inaccessable data'], 500);
    }
    try {
      $offer = $offer->replicate();
      if(substr($offer->name, -strlen(' (A/B Testing)')) !== ' (A/B Testing)')
        $offer->name .= ' (A/B Testing)';
      $offer->save();
      return response()->json(['status' => true, 'message' => "Duplicate success"], 200);
    } catch (Exception $e) {
      Log::error('update offer: fail. message: '.$e->getMessage().'. file: '.$e->getFile().'. line: '.$e->getLine());
      return response()->json(['status' => false, 'message' => 'Duplicate failed '], 500);
    }
  }

  public function addScriptsToStorefront()
  {
    $user = auth()->user();
    $offer_lib = new OfferLib($user);
    #create script
    $script_html = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script><script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>";
    // dd($script_html);
    /*
		{
			"name": "Bootstrap",
			"description": "Build responsive websites",
			"src": "https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js",
			"auto_uninstall": true,
			"load_method": "default",
			"location": "footer",
			"visibility": "all_pages",
			"kind": "src"
		}
		*/
    $script_config = [
      "name" => "Ult upsell script",
      "html" => $script_html,
      "auto_uninstall" => true,
      "load_method" => "default",
      "location" => "head",
      "visibility" => "all_pages",
      "kind" => "script_tag"
    ];

    $script_config = json_encode($script_config);
    $script = $offer_lib->createScript($script_config);
    $script_uuid = $script['uuid'];

    return response()->json(['status' => true, 'message' => 'create success'], 201);
  }

  public function addWidgetToStorefront()
  {
    $user = auth()->user();
    $offer_lib = new OfferLib($user);

    #get regions
    $regions = $offer_lib->getThemeRegions();

    # create widget template
    $html = view('storefront.popup-widget', ['store_hash' => $user->store_hash])->render();
    $template = [
      "name" => "Storefront modal",
      "template" => $html
    ];
    $template = json_encode($template);
    $widget_template = $offer_lib->createWidgetTemplate($template);
    $widget_template_uuid = $widget_template['uuid'];

    # create widget
    $widget = [
      "name" => "Storefront modal",
      "widget_configuration" => json_decode("{}"),
      "widget_template_uuid" => $widget_template_uuid
    ];
    $widget_config = json_encode($widget);
    $widget = $offer_lib->createWidget($widget_config);
    $widget_uuid = $widget['uuid'];

    # create placement
    $placement = [
      "widget_uuid" => $widget_uuid,
      "template_file" => "pages/product",
      "status" => "active",
			"region" => end($regions)['name']
    ];
    $placement_config = json_encode($placement);
    $placement = $offer_lib->createPlacement($placement_config);

    return response()->json(['status' => true, 'message' => 'create success'], 201);
  }
}
