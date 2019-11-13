<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 200)->create();
    }

    // {"rol_id": 1, "manager_id": 2, "Fname": "Camilo", "Lname": "jimenez", "Email": "camilo.boyaca@kantar.com", "Area": "LDC", "Pass": "Camilo1234", "Cargo": "Junior"}
}
