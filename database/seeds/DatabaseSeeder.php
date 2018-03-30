<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use \App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // without using model
        /*DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('11223344'),
            'admin' => '1',
        ]);*/
        // using model
        $user = new User();
        $user->name ='admin';
        $user->email ='admin@gmail.com';
        $user->mobile ='7503187608';
        $user->password = bcrypt('11223344');
        $user->admin = '1';
        $user->remember_token =str_random('100');
        $user->save();
    }
}
