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
        
        factory( App\User::class, 29 )->create(); /* Se crean 29 usuarios */

        App\User::create( [
            
            'name' => 'Marco Perdomo',
            'email' => 'admin@mail.com',
            'password' => bcrypt( '123456' ),

        ] );

    }
}
