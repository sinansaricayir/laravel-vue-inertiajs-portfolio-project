<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $colorName = $this->faker->randomElement(\App\Models\Project::getAvailableTextColors());
        $iconName = $this->faker->randomElement(\App\Models\Project::getAvailableIcons());
        return [
            //
            'title' => $this->faker->unique()->words(2, true),
            'description' => $this->faker->sentence(),
            'color' => $colorName,
            'icon_name' => $iconName,
        ];
    }
}