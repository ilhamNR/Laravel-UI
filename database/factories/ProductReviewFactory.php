<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductReview>
 */
class ProductReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'score' => mt_rand(1,5),
            'review' => fake()->sentence(mt_rand(1,20)),
            'product_id' => mt_rand(1,50),
            'user_id' => mt_rand(1,50),
            //
        ];
    }
}
