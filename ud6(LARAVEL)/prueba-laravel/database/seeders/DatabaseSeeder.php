<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insertGetId(
        [
          'name' => 'Josep',
          'email' => 'josep@hola.com',
          'password' => Hash::make('hola'),
          'email_verified_at' => now(),
          'remember_token' => Str::random(10),
          'created_at' => now(),
          'updated_at' => now()
        ]
      );

      DB::table('comments')->insertGetId(
        [
          'user_id' => 1,
          'body' => 'Hola, som en Josep',
          'created_at' => now()
        ]
      );

      $user = User::factory()->create([
        'name' => 'Juanita Banana',
        'email' => 'juanitabanana@hola.com',
      ]);

      Comment::factory()->create([
        'user_id' => $user->id,
      ]);

      User::factory()
        ->has(Comment::factory()->count(3))
        ->count(10)
        ->create();
    }
}
