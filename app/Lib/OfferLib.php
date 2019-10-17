<?php

namespace App\Lib;

use Bigcommerce\Api\Client as Bigcommerce;
use GuzzleHttp\Client as GuzzleHttp;

class OfferLib
{
    public static function configure($merchant)
    {
        Bigcommerce::configureOAuth(array(
            'client_id' => $merchant['client_id'],
            'auth_token' => $merchant['auth_token'],
            'store_hash' => $merchant['store_hash']
        ));
    }

    public static function configureHeader($merchant) {
        $headers = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'x-auth-client' => $merchant['client_id'],
            'x-auth-token' => $merchant['auth_token']
        ];
        return $headers;
    }

    public static function getProductList($merchant) {
        OfferLib::configure($merchant);
        $products = Bigcommerce::getProducts();
        return $products;
    }

    public static function getThemeRegions($merchant) {
        $client = new GuzzleHttp();
        $headers = OfferLib::configureHeader($merchant);
        $query = [
            'templateFile' => 'pages/product'
        ];
        $res = $client->request(
            'GET', 'https://api.bigcommerce.com/stores/' . $merchant['store_hash'] . '/v3/content/regions',
            [
                'headers' => $headers,
                'query' => $query
            ]
        );
        $regions = json_decode($res->getBody()->getContents(), true)['data'];
        return $regions;
    }

    /*
    $template = [
        "name" => "Storefront modal",
        "template" => "<div class='modal fade bd-example-modal-lg' tabindex='-1' role='dialog' aria-labelledby='myLargeModalLabel' aria-hidden='true'><div class='modal-dialog modal-lg store-popup'></div></div>",
    ];
    $template = json_encode($template);
    */
    public static function createWidgetTemplate($merchant, $template, $region = null) {
        $client = new GuzzleHttp();
        $headers = OfferLib::configureHeader($merchant);
        $body = $template;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $merchant['store_hash'] . '/v3/content/widget-templates',
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        $widgetTemplate = json_decode($res->getBody()->getContents(), true)['data'];
        return $widgetTemplate;
    }

    /*
    $widget = [
        "name" => "Storefront modal",
        "widget_configuration" => json_decode("{}"),
        "widget_template_uuid" => "d70907cd-742c-452f-95aa-ce927d513c97"
    ];
    $widgetConfig = json_encode($widget);
    */
    public static function createWidget($merchant, $widgetConfig) {
        $client = new GuzzleHttp();
        $headers = OfferLib::configureHeader($merchant);
        $body = $widgetConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $merchant['store_hash'] . '/v3/content/widgets',
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        $widget = json_decode($res->getBody()->getContents(), true)['data'];
        return $widget;
    }

    /*
    $placement = [
        "widget_uuid" => $widgetUuid,
        "template_file" => "pages/product",
        "status" => "active",
        "region" => end($regions)['name']
    ];
    $placementConfig = json_encode($placement);
    */
    public static function createPlacement($merchant, $placementConfig) {
        $client = new GuzzleHttp();
        $headers = OfferLib::configureHeader($merchant);
        $body = $placementConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $merchant['store_hash'] . '/v3/content/placements',
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        $placement = json_decode($res->getBody()->getContents(), true)['data'];
        return $placement;
    }

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
    public static function createScript($merchant, $scriptConfig) {
        $client = new GuzzleHttp();
        $headers = OfferLib::configureHeader($merchant);
        $body = $scriptConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $merchant['store_hash'] . '/v3/content/scripts',
            [
                'headers' => $headers,
                'body' => $body
            ]
        );
        $script = json_decode($res->getBody()->getContents(), true)['data'];
        return $script;
    }
}
