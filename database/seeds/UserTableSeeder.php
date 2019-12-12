<?php

use Illuminate\Database\Seeder;

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
            'name' => 'user1',
            'gender' => 'hombre',
            'email' => 'prueba1@prueba.com',
            'user' => 'user1',
            'password' => '123prueba456'
        ]);

        DB::table('users')->insert([
            'name' => 'user2',
            'gender' => 'mujer',
            'email' => 'prueba2@prueba.com',
            'user' => 'user2',
            'password' => '123prueba456'
        ]);

        DB::table('users')->insert([
            'name' => 'user3',
            'gender' => 'hombre',
            'email' => 'prueba3@prueba.com',
            'user' => 'user3',
            'password' => '123prueba456'
        ]);

        DB::table('users')->insert([
            'name' => 'user4',
            'gender' => 'mujer',
            'email' => 'prueba4@prueba.com',
            'user' => 'user4',
            'password' => '123prueba456'
        ]);

        DB::table('users')->insert([
            'name' => 'user5',
            'gender' => 'hombre',
            'email' => 'prueba5@prueba.com',
            'user' => 'user5',
            'password' => '123prueba456'
        ]);
    }
}
