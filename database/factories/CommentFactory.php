<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'content'=>fake()->sentence(rand(5,10)),
            'user_id'=>fake()->numberBetween(390,589),
            'post_id'=>fake()->numberBetween(1,500)
        ];
    }
}
