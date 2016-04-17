<?php

use Illuminate\Database\Seeder;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0;$i<20;$i++){
            User::create([
                "username"=>"username$i",
                "email"=>"email$i",
                "password"=>"password$i"
            ]);
        }
    }
}
