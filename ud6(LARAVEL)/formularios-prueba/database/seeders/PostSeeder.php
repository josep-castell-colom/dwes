<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(3)->create([
            "titulo" => "Josep's post PUBLICO",
            "user_id" => 1,
        ]);

        Post::factory(3)->create([
            "titulo" => "Rafa's post PUBLICO",
            "user_id" => 2,
        ]);

        Post::factory(3)->create([
            "titulo" => "Josep's post PRIVADO",
            "user_id" => 1,
            "acceso" => "privado",
        ]);

        Post::factory(3)->create([
            "titulo" => "Rafa's post PRIVADO",
            "user_id" => 2,
            "acceso" => "privado",
        ]);
    }
}
