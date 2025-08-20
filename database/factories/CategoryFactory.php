<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->randomElement([
            'Technology', 'Lifestyle', 'Travel', 'Food', 'Health',
            'Education', 'Business', 'Fashion', 'Sports', 'Entertainment'
        ]);

        return [
            'name' => $name,
            'description' => $this->faker->sentence(10),
            'image' => $this->faker->imageUrl(640, 480, 'categories', true, $name),
            'created_at' => $this->faker->dateTimeThisYear(),
            'updated_at' => $this->faker->dateTimeThisYear(),
        ];
    }
}
