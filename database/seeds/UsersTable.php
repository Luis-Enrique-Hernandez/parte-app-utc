<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
       	'name'=>'andres',
       	'email'=>'losdelafehernandez@hotmail.com',
       	'password'=>bcrypt('123456'),
        'admin'=> true
       ]);
    }
}
