<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        Client::create(['name' => 'María López', 'phone' => '3001234567', 'email' => 'maria@example.com', 'address' => 'Calle 10 #5-20']);
        Client::create(['name' => 'Carlos Pérez', 'phone' => '3009876543', 'email' => 'carlos@example.com', 'address' => 'Carrera 15 #22-30']);
        Client::create(['name' => 'Ana Torres', 'phone' => '3011122334', 'email' => 'ana@example.com', 'address' => 'Avenida 8 #12-45']);
        Client::create(['name' => 'Luis Gómez', 'phone' => '3025566778', 'email' => 'luis@example.com', 'address' => 'Calle 30 #7-18']);
        Client::create(['name' => 'Sofía Ramírez', 'phone' => '3033344556', 'email' => 'sofia@example.com', 'address' => 'Carrera 20 #9-33']);
    }
}
