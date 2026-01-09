<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Seudonimo>
 */
class SeudonimoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'autor_id' => \App\Models\Autor::factory(),
        'nombre_pluma' => $this->faker->unique()->userName(),
        'fecha_registro' => $this->faker->date(),
        ];
    }
}
