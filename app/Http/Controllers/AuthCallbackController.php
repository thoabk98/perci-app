<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttp;
use App\Lib\OfferLib;

class AuthCallbackController extends Controller
{
    public function authCallback(Request $request) {
        $tokenUrl = "https://login.bigcommerce.com/oauth2/token";
        $headers = [
            'content-type' => 'application/x-www-form-urlencoded'
        ];
        $params = [
            "client_id" => env('CLIENT_ID'),
            "client_secret" => env('CLIENT_SECRET'),
            "redirect_uri" => env('APP_URL') . "/auth/callback",
            "grant_type" => "authorization_code",
            "code" => $request->get("code"),
            "scope" => $request->get("scope"),
            "context" => $request->get("context"),
        ];

        $client = new GuzzleHttp();
        $response = $client->request(
            'POST', $tokenUrl,
            [
                'headers' => $headers,
                'query' => $params
            ]
          );

        $data = json_decode($response->getBody()->getContents());
        // dd($data->user->username);
        $user = [
            "name" => $data->user->username,
            "admin" => 1,
            "email" => $data->user->email,
            "client_id" => $data->user->id,
            "client_secret" => "",
            "store_hash" => substr($data->context, 7),
            "password" => Hash::make("123456"),
            "auth_token" => $data->access_token,
            "phone" => "",
        ];

        $new_user = User::create($user);
        $this->deleteWidgets($new_user);
        $this->deleteScripts($new_user);
        $this->addScripts($new_user);
        $this->addWidget($new_user);

        return "<h1>Installation Success</h1>";
    }

    public function loadCallback(Request $request) {
        $signed_payload = $request->signed_payload;
        list($encodedData, $encodedSignature) = explode('.', $signed_payload, 2);

        // decode the data
        $signature = base64_decode($encodedSignature);
        $jsonStr = base64_decode($encodedData);
        $data = json_decode($jsonStr, true);

        // confirm the signature
        $expectedSignature = hash_hmac('sha256', $jsonStr, env('CLIENT_SECRET'), $raw = false);
        if (!hash_equals($expectedSignature, $signature)) {
            error_log('Bad signed request from BigCommerce!');
            return '<h2>Unauthorize Request</h2>';
        }

        $user = User::where('client_id', $data['user']['id'])->first();
        Auth::loginUsingId($user->id);

        return redirect()->route('dashboard');

    }

    public function uninstallCallback(Request $request) {
        try{
            $signed_payload = $request->signed_payload;
            list($encodedData, $encodedSignature) = explode('.', $signed_payload, 2);

            // decode the data
            $signature = base64_decode($encodedSignature);
            $jsonStr = base64_decode($encodedData);
            $data = json_decode($jsonStr, true);

            // confirm the signature
            $expectedSignature = hash_hmac('sha256', $jsonStr, env('CLIENT_SECRET'), $raw = false);
            if (!hash_equals($expectedSignature, $signature)) {
                error_log('Bad signed request from BigCommerce!');
                return '<h2>Unauthorize Request</h2>';
            }

            $user = User::where('client_id', $data['user']['id'])->firstOrFail();
            User::destroy($user->id);
            $this->deleteWidgets($user);
            $this->deleteScripts($user);
            return "<h1>Uninstallation Success</h1>";
        } catch (Exception $exception){
            Log::error("[Uninstall App Callback]". $exception->getMessage());
            return $this->response(false, $exception->getMessage(), []);
        }
    }

    public function addWidget($user) {
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

        return ['status' => true, 'message' => 'create widget success'];
    }

    public function addScripts($user) {
        $offer_lib = new OfferLib($user);
        #create script
        $script_html = "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js\"></script><script src=\"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js\" integrity=\"sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM\" crossorigin=\"anonymous\"></script>";
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

        return ['status' => true, 'message' => 'create scripts success'];
    }

    public function deleteWidgets($user) {
        $offer_lib = new OfferLib($user);
        $widgetTemplates = $offer_lib->getAllWidgetTemplate();
        $new = [];
        foreach ($widgetTemplates as $widgetTemplate) {
            if ($widgetTemplate['name'] == 'Storefront modal') {
                $offer_lib->deleteWidgetTemplate($widgetTemplate['uuid']);
            }
        }
        return ['status' => true, 'message' => 'Delete widget success'];;
    }

    public function deleteScripts($user) {
        // $user = auth()->user();
        $offer_lib = new OfferLib($user);
        $scripts = $offer_lib->getAllScript();
        $new = [];
        foreach ($scripts as $script) {
            if ($script['name'] == 'Ult upsell script') {
                $offer_lib->deleteScript($script['uuid']);
            }
        }
        return ['status' => true, 'message' => 'Delete script success'];
    }
}
