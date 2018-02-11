<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->name = 'Stuczych';
        $user->password = bcrypt('Logitech7');
        $user->email = 'stuczych@hotmail.com';
        $user->save();
    }
}
