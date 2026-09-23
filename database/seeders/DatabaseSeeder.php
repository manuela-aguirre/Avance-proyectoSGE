<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'tipo_identificacion' => 'CC',
            'numero_identificacion' => '1234567890',
        ]);

        // Orden importa: Editorial y Genero primero (son referenciados por Libro)
        $this->call([
            EditorialSeeder::class,
            GeneroSeeder::class,
            LibroSeeder::class,
        ]);
    }
}
