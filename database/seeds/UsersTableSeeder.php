<?php

use App\User;
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
        //
        User::create([
        	'name' => 'cesar',
            'username' => 'cesarmolina',
        	'email' => 'cesar.molina.05@gmail.com',
        	'password' => bcrypt('12345678')
        ]);

        factory(User::class,10)->create(); //llama la factory y crear usuario
        
    }
}
