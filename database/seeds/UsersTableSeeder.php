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
        App\User::create([
            'name' => 'Gabriel Picco',
            'username' => 'gabrieeelsp',
            'email' => 'contacto@plastitodo.com.ar',
            'password' => bcrypt('roscen')
        ]);
    }
}
