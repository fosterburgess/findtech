<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Technology>
 */
class TechnologyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $az = range('a', 'z');

        return [
            'title' => fake()->words(rand(8, 30), true),
            'case_number' => implode('', fake()->randomElements($az, rand(2, 5))).'-'.rand(100, 99999),
            'abstract' => fake()->words(rand(80, 300), true),
            'applications' => fake()->words(rand(80, 300), true),
            'advantages' => fake()->words(rand(80, 300), true),
            'publications' => fake()->words(rand(80, 300), true),
            'related_links' => fake()->words(rand(80, 300), true),
            'tags' => fake()->words(rand(0, 6)),
        ];
    }
}
