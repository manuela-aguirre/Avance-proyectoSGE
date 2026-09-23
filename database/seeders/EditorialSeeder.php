<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Editorial;

class EditorialSeeder extends Seeder
{
    public function run(): void
    {
        $editoriales = [
            'Pearson',
            'McGraw-Hill',
            'Alfaomega',
            'Planeta',
            'Editorial Trillas',
            'Editorial Norma',
            'Ediciones Anaya',
            'Penguin Random House',
            "O'Reilly Media",
            'Editorial Santillana',
        ];

        foreach ($editoriales as $nombre) {
            Editorial::create(['nombre' => $nombre]);
        }
    }
}
