<?php

use Illuminate\Database\Seeder;
use \App\User;

class admindetail extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'pooja bora';
        $user->email = 'pooja.bora1@w3villa.com';
        $user->mobile = '7503187608';
        $user->password = bcrypt('1122334455');
        $user->remember_token = str_random(100);
        $user->admin = '1';
        $user->save();
    }
}
