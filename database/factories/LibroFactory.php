<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Libro>
 */
class LibroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'editorial_id' => \App\Models\Editorial::factory(),
        'titulo' => $this->faker->sentence(3),
        'isbn' => $this->faker->unique()->isbn13(),
        'paginas' => $this->faker->numberBetween(80, 800),
        ];
    }
}
