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
            'client_id' =>  "d1fs9hkwj5qg1ko009sc78gp3fpfl",
            'client_secret' => "b93d950cdc35ed0809e8bbdcf9db7a692a720b3c9942199a74792949d941f080NAME",
            'auth_token' => "p5oj5sf04im8os9s6l4xvg2jdd4f6lr",
            'store_hash' => "459zlh8ulo",
            'phone'     =>  '0945275567',
            'admin'     =>  '1'
        ]);
    }
}
