<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'email' => fake()->companyEmail(),
            'tags' => 'Laravel,api,backend,json',
            'website' => fake()->url(),
            'company' => fake()->company(),
            'location' => fake()->city(),
            'description' => fake()->paragraph(5)
        ];
    }
}
