<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username'      => 'admin_espina',
            'first_name'    => 'Paul',
            'last_name'     => 'Espina',
            'password'      => bcrypt('espina'),
            'role'          => 'admin'
        ]);

        User::create([
            'username'      => 'admin_punzalan',
            'first_name'    => 'Neil',
            'last_name'     => 'Punzalan',
            'password'      => bcrypt('punzalan'),
            'role'          => 'admin'
        ]);

        User::create([
            'username'      => 'admin_conales',
            'first_name'    => 'James',
            'last_name'     => 'Conales',
            'password'      => bcrypt('conales'),
            'role'          => 'admin'
        ]);

        User::create([
            'username'      => 'admin_luna',
            'first_name'    => 'Korj',
            'last_name'     => 'Luna',
            'password'      => bcrypt('luna'),
            'role'          => 'admin'
        ]);

        User::create([
            'username'      => 'admin_amis',
            'first_name'    => 'Medrick',
            'last_name'     => 'Amis',
            'password'      => bcrypt('amis'),
            'role'          => 'admin'
        ]);

        User::create([
            'username'      => 'user_malasaga',
            'first_name'    => 'Elisa',
            'last_name'     => 'Malasaga',
            'password'      => bcrypt('malasaga'),
        ]);

        User::create([
            'username'      => 'user_tejuco',
            'first_name'    => 'Hadji',
            'last_name'     => 'Tejuco',
            'password'      => bcrypt('tejuco'),
        ]);
    }
}
