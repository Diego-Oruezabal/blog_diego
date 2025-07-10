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
        $exampleImages = [
            'blog/1.jpg',
            'blog/2.jpg',
            'blog/3.jpg',
            'blog/4.jpg',
            'blog/5.jpg',
            'blog/6.jpg',
            'blog/7.jpg',
            'blog/8.jpg',
            'blog/9.jpg',
            'blog/10.jpg',
            'blog/11.jpg',
            'blog/12.jpg',
            'blog/13.jpg',
            'blog/14.jpg',
            'blog/15.jpg',
            'blog/16.jpg',
            'blog/17.jpg',
            'blog/18.jpg',
            'blog/19.jpg',
            'blog/20.jpg',
        ];


    return [
        'user_id' => \App\Models\User::inRandomOrder()->first()->id ?? 1,
        'title' => $this->faker->sentence(),
        'slug' => $this->faker->slug(),
        'summary' => $this->faker->sentence(),
        'content' => $this->faker->paragraphs(3, true),
        'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
        'featured_image' => $this->faker->randomElement($exampleImages),
        'created_at' => now(),
        'updated_at' => now(),
        'published_at' => now(), // Assuming you want to set this to now for published
    ];
    }
}
