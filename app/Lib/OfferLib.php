<?php

namespace App\Lib;

use Bigcommerce\Api\Client as Bigcommerce;
use GuzzleHttp\Client as GuzzleHttp;

class OfferLib
{
    public $client_id;
    public $auth_token;
    public $store_hash;
    public $headers;

    public function __construct($user){
        $this->client_id = $user->client_id;
        $this->auth_token = $user->auth_token;
        $this->store_hash = $user->store_hash;

        $this->headers = [
            'accept' => 'application/json',
            'content-type' => 'application/json',
            'x-auth-client' => $this->client_id,
            'x-auth-token' => $this->auth_token
        ];
    }

    public function configure()
    {
        Bigcommerce::configureOAuth(array(
            'client_id' => $this->client_id,
            'auth_token' => $this->auth_token,
            'store_hash' => $this->store_hash
        ));
    }

    public function getProductList($params = []) {
        $this->configure();
        $params["page"] = (empty($params["page"])) ? 1 : $params["page"];
        $params["limit"] = (empty($params["limit"])) ? 10 : $params["limit"];
        $products = Bigcommerce::getProducts($params);
        return $products;
    }

    public function getThemeRegions() {
        $client = new GuzzleHttp();
        $query = [
            'templateFile' => 'pages/product'
        ];
        $res = $client->request(
            'GET', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/content/regions',
            [
                'headers' => $this->headers,
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
    public function createWidgetTemplate($template, $region = null) {
        $client = new GuzzleHttp();
        $body = $template;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/content/widget-templates',
            [
                'headers' => $this->headers,
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
    public function createWidget($widgetConfig) {
        $client = new GuzzleHttp();
        $body = $widgetConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/content/widgets',
            [
                'headers' => $this->headers,
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
    public function createPlacement($placementConfig) {
        $client = new GuzzleHttp();
        $body = $placementConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/content/placements',
            [
                'headers' => $this->headers,
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
    public function createScript($scriptConfig) {
        $client = new GuzzleHttp();
        $body = $scriptConfig;
        $res = $client->request(
            'POST', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/content/scripts',
            [
                'headers' => $this->headers,
                'body' => $body
            ]
        );
        $script = json_decode($res->getBody()->getContents(), true)['data'];
        return $script;
    }

    public function getAllProductImages($productId) {
        $client = new GuzzleHttp();
        $res = $client->request(
            'GET', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/catalog/products/' . $productId . '/images',
            [
                'headers' => $this->headers,
            ]
        );
        $images = json_decode($res->getBody()->getContents(), true)['data'];
        return $images;
    }

    public function getProductThumbnailUrl($productId) {
        $images = $this->getAllProductImages($productId);
        foreach ($images as $image) {
            if ($image['is_thumbnail']) {
                return $image['url_thumbnail'];
            }
        }
        return $image[0]['url_thumbnail'];
    }

    public function getProduct($productId) {
        $client = new GuzzleHttp();
        $res = $client->request(
            'GET', 'https://api.bigcommerce.com/stores/' . $this->store_hash . '/v3/catalog/products/' . $productId,
            [
                'headers' => $this->headers,
            ]
        );
        $data = json_decode($res->getBody()->getContents(), true)['data'];
        return $data;
    }
}
