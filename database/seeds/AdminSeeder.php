<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::create([
            'name'=>'admin',
            'email'=>'admin@email.com',
            'password'=>bcrypt("adminpassword"),
            'admin'=>true,
        ]);
    }
}
