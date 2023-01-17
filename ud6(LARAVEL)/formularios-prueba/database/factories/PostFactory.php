<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => fake()->sentence(3),
            'extracto' => fake()->sentence(6),
            'contenido' => fake()->paragraph(1),
            'caducable' => false,
            'comentable' => true,
            'acceso' => 'publico',
            'user_id' => 1,
        ];
    }
}
