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
        'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1,
        'title' => $this->faker->sentence(),
        'slug' => $this->faker->slug(),
        'summary' => $this->faker->sentence(),
        'content' => $this->faker->paragraphs(3, true),
        'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
        'featured_image' => $this->faker->imageUrl(640, 480, 'nature', true, 'Faker'),
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(), // Assuming you want to set this to now for published
    ];
    }
}
