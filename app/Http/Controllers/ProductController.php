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
        $offer_lib = new OfferLib($user);
        $params = [];
        if(!empty($request->page)){
            $params['page'] = $request->page;
        }
        $params["include"] = "images";
        $products = $offer_lib->getProductList($params);
        // dd($products);
        $data = [];
        foreach ($products as $product){
            $item = new \stdClass();
            $item->id = $product['id'];
            $item->name = $product['name'];
            $item->image = $product['images'][0]['url_thumbnail'];
            $item->price = $product['price'];
            array_push($data, $item);
        }
        $data = [
            'data' => $data,
            // 'total' => $products->meta->pagination->total // cai nay k co trong return nhe a :v
        ];
        return $this->response(true, '', $data);
    }
}
