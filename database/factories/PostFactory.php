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
    public function definition(): array
    {
        return [
            'title' => $this->faker->paragraph(1),
            'body' => $this->faker->paragraph(20),
            'user_id' => \App\Models\User::get()->random()->id,
            'image' => $this->faker->image('public/storage/images', 900, 400, null, false),
        ];
    }
}
