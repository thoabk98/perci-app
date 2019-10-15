<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib\OfferLib;

class OfferController extends Controller
{
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
}
