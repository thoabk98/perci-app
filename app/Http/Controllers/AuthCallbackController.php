<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttp;

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
            "client_secret" => $data->access_token,
            "store_hash" => substr($data->context, 7),
            "password" => Hash::make("123456"),
            "auth_token" => "",
            "phone" => "",
        ];

        $new_user = User::create($user);

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

            return "<h1>Uninstallation Success</h1>";
        } catch (Exception $exception){
            Log::error("[Uninstall App Callback]". $exception->getMessage());
            return $this->response(false, $exception->getMessage(), []);
        }
    }
}
