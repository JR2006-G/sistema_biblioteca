<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Autor;
use App\Models\Editorial;
use App\Models\Libro;
use App\Models\Seudonimo;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $editoriales = Editorial::factory(5)->create();
        $autores = Autor::factory(10)->create();

        $autores->take(7)->each(function ($autor) {
            Seudonimo::create([
                'autor_id' => $autor->id,
                'nombre_pluma' => fake()->unique()->userName(),
                'fecha_registro' => fake()->date(),
            ]);
        });

        $libros = Libro::factory(20)->create([
            'editorial_id' => fn() => $editoriales->random()->id,
        ]);

        $autores->each(function ($autor) use ($libros) {
            $autor->libros()->attach(
                $libros->random(rand(1, 4))->pluck('id')->toArray()
            );
        });
    }
}
