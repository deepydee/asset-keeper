<?php

namespace Database\Factories;

use App\Models\Admin;
use App\Models\Moderator;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title,
            'price' => fake()->numberBetween(100, 3000),
        ];
    }
    public function admin(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Admin::first()->id
            ],
        );
    }

    public function moderator(): self
    {
        return $this->state(
            fn () => [
                'user_id' => Moderator::first()->id
            ],
        );
    }
}
