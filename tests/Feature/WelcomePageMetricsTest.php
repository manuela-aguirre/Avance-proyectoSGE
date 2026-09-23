<?php

namespace Tests\Feature;

use Tests\TestCase;

class WelcomePageMetricsTest extends TestCase
{
    public function test_welcome_page_uses_data_driven_metrics(): void
    {
        $path = storage_path('app/data/libro.csv');
        $fileCount = 0;
        $stockHealthy = 0;

        if (($handle = fopen($path, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ',');

            if ($headers !== false) {
                while (($row = fgetcsv($handle, 0, ',')) !== false) {
                    if (count($row) === count($headers)) {
                        $fileCount++;

                        $stockIndex = array_search('stock', array_map('strtolower', $headers), true);
                        $stock = $stockIndex !== false ? trim((string) ($row[$stockIndex] ?? '')) : '';

                        if (is_numeric($stock) && (int) $stock > 2) {
                            $stockHealthy++;
                        }
                    }
                }
            }

            fclose($handle);
        }

        $expectedRegistros = $fileCount >= 1000
            ? number_format($fileCount / 1000, 1, '.', '').'k'
            : (string) $fileCount;

        $expectedDisponibilidad = $fileCount > 0
            ? round(($stockHealthy / $fileCount) * 100, 1).'%'
            : '0%';

        $this->get('/')
            ->assertOk()
            ->assertSee('<strong>'.$expectedRegistros.'</strong>Registros', false)
            ->assertSee('<strong>'.$expectedDisponibilidad.'</strong>Disponibilidad', false)
            ->assertDontSee('12.4k');
    }
}
