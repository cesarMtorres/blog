<?php

use App\Tweet;
use App\User;
use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users=User::all();

        $users->each(function($user){
         factory(Tweet::class,10)->create([
         	'user_id' => $user->id
         ]);
        });

    }
}
