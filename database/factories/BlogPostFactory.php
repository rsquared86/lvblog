<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BlogPost>
 */
class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3, true),
            'content' => $this->faker->paragraphs(5, true),
            'slug' => $this->faker->unique()->slug(3),
            'user_id' => User::factory(),
            'comment_id' => '1',
        ];
    }
}
