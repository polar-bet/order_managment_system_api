<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'category_id' => Category::all()->random()->id,
            'user_id' => User::whereHas('role', fn ($role) => $role->where('name', RoleEnum::TRADER->value))->inRandomOrder()->value('id'),
            'price' => fake()->randomFloat(2, 0, 100000),
            'count' => fake()->numberBetween(0, 1000)
        ];
    }
}
