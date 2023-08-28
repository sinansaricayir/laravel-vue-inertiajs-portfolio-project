<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $color = $this->faker->randomElement(\App\Models\Skill::getAvailableBackgroundColors());
        return [
            //
            'name' => $this->faker->unique()->words(2, true),
            'color' => $color,
        ];
    }
}