<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Josep Castell',
            'email' => 'josep@hola.com',
            'password' => Hash::make('hola'),
        ]);

        User::factory()->create([
            'name' => 'Rafa Ivorra',
            'email' => 'rafa@hola.com',
            'password' => Hash::make('hola'),
        ]);
    }
}
