<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'name' => 'administrador uno',
            'email' => 'adminuno@gmail.com',
            'password' => bcrypt('12345678')
        ));
    }
}
