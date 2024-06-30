<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => 1,
            'title' => fake()->sentence(mt_rand(2, 8)),
            'slug' => fake()->slug(),
            'excerpt' => fake()->paragraph(),
            'body' => fake()->paragraph(mt_rand(10, 25)),
            'image_path' => url('public/assets/img/bg-email.jpeg'),
        ];
    }
}
