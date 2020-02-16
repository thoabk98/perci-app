<?php

use App\Lib\OfferLib;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = (object) [
            'client_id' =>  "8io93oaeqanc9csa5d282m9eotsqq97",
            'auth_token' => "t7atzzl0i6bkq5r7ztorhkxge0vqcc2",
            'store_hash' => "b9u5amxjcu",
        ];
        $products = (new OfferLib($users))->getProductList();
        $offers = [];
        foreach ($products as $product){
            $item = [
                "user_id" => 1,
                "base_product_id" => $product['id'],
                "type" => 2,
                "position" => 1,
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now()
            ];
            array_push($offers, $item);
        } 
        DB::table("offers")->insert($offers);
    }
}
