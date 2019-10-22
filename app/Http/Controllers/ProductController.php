<?php

namespace App\Http\Controllers;

use App\Lib\OfferLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Bigcommerce\Api\Client as Bigcommerce;

class ProductController extends AdminController
{
    public function get(Request $request){
        //dd($request->al())
        $user = Auth::user();
        $merchant = array(
            'client_id' => $user->client_id,
            'auth_token' => $user->auth_token,
            'store_hash' => $user->store_hash
        );
        $params = [];
        if(!empty($request->page)){
            $params['page'] = $request->page;
        }
        $params["include"] = "images";
        $products = OfferLib::getProductList($merchant, $params);

        $data = [];
        foreach ($products->data as $product){
            $item = new \stdClass();
            $item->id = $product->id;
            $item->name = $product->name;
            $item->image = $product->images[0]->url_thumbnail;
            $item->price = $product->price;
            array_push($data, $item);
        }
        $data = [
            'data' => $data,
            'total' => $products->meta->pagination->total
        ];
        return $this->response(true, '', $data);
    }
}
