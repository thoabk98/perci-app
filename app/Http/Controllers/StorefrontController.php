<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\OfferItem;
use App\Lib\OfferLib;
use App\Models\User;

class StorefrontController extends AdminController
{
    public function popupContent(Request $request) {
        $user = User::select('client_id', 'auth_token', 'store_hash')->where('store_hash', $request->store_hash)->first();
        if(empty($user)){
            return '';
        }else{
            $offer = Offer::where('base_product_id', $request->id)->first();
            if(empty($offer)){
                return $this->response(true, '');
            }else{
                $offer_item = OfferItem::where('offer_id', $offer->id)->first();
                if(empty($offer_item)){
                    // return $this->response(true, '');
                    return '';
                }else{
                    $offer_lib = new OfferLib($user);
                    $images = $offer_lib->getAllProductImages($offer_item->offer_product_id);
                    $offer_item->image = $images[0]['url_standard'];
                    $offer_item->data = $offer_lib->getProduct($offer_item->offer_product_id);
                    // dd($offer_item->data);
                    $html = view('storefront.popup-content', compact('offer_item'))->render();
                    // return $this->response(true, '', $html);

                    // * wont work in FF w/ Allow-Credentials
                    //if you dont need Allow-Credentials, * seems to work
                    // header('Access-Control-Allow-Origin: *');
                    //if you need cookies or login etc
                    // header('Access-Control-Allow-Credentials: true');
                    // if ($this->getRequestMethod() == 'OPTIONS')
                    // {
                    //     header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
                    //     header('Access-Control-Max-Age: 604800');
                    //     //if you need special headers
                    //     header('Access-Control-Allow-Headers: x-requested-with');
                    //     exit(0);
                    // }
                    return ['responseText' => $html, 'offer_id' => $offer->id];
                }
            }
        }

    }

    public function popupWidget(Request $request) {
        return view('storefront.popup-widget');
    }
}
