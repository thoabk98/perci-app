<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            "client_id" => "ly8cs99p0pkyghlr4mdesd1r008umd7",
            "client_secret" => "6e5ff043b5314da08caaaa166295f637701729aa6200013f81292a92903ac7e9",
            "redirect_uri" => "https://3e519963.ngrok.io/api/auth/callback",
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
        ];

        $new_user = User::create($user);

        return "<h1>Installation Success</h1>";
    }
}
