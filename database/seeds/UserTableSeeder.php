<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'     =>  'admin@admin.com',
            'name'  =>  'admin',
            'password'  =>  bcrypt('123456'),
            'client_id' =>  "8io93oaeqanc9csa5d282m9eotsqq97",
            'client_secret' => "2547f45b8b7011d030e251a8d463d18cf0c9de35afd79d891eb14520f425a2fa",
            'auth_token' => "t7atzzl0i6bkq5r7ztorhkxge0vqcc2",
            'store_hash' => "b9u5amxjcu",
            'phone'     =>  '0945275567',
            'admin'     =>  '1'
        ]);
    }
}
