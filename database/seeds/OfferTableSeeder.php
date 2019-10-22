<?php

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
        $users = [
            'client_id' =>  "d1fs9hkwj5qg1ko009sc78gp3fpfl",
            'auth_token' => "p5oj5sf04im8os9s6l4xvg2jdd4f6lr",
            'store_hash' => "459zlh8ulo",
        ];
        $products = \App\Lib\OfferLib::getProductList($users);
        $offers = [];
        foreach ($products as $product){
            $item = [
                "user_id" => 1,
                "base_product_id" => $product->id,
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
