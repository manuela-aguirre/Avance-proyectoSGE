<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Ruta real: storage/app/data/{filename}
     * (usamos storage_path() directo, sin el facade Storage,
     * porque en Laravel 11+ el disco 'local' apunta por defecto
     * a storage/app/private y no a storage/app)
     */
    private function csvPath(string $filename): ?string
    {
        $path = storage_path('app/data/'.$filename);

        return file_exists($path) ? $path : null;
    }

    /**
     * Lee un CSV y devuelve un array asociativo por fila,
     * usando la primera línea como encabezados.
     */
    private function readCsv(string $filename): array
    {
        $path = $this->csvPath($filename);

        if (! $path) {
            return [];
        }

        $rows = [];
        if (($handle = fopen($path, 'r')) !== false) {
            $headers = fgetcsv($handle, 0, ',');

            if ($headers === false) {
                fclose($handle);
                return [];
            }

            // Quita un posible BOM invisible al inicio del primer encabezado
            $headers[0] = preg_replace('/^\x{FEFF}/u', '', $headers[0]);
            $headers = array_map(fn ($h) => strtolower(trim($h)), $headers);

            while (($data = fgetcsv($handle, 0, ',')) !== false) {
                if (count($data) === count($headers)) {
                    $rows[] = array_combine($headers, $data);
                }
            }
            fclose($handle);
        }

        return $rows;
    }

    private function formatCompactNumber(int $value): string
    {
        if ($value >= 1000) {
            return number_format($value / 1000, 1, '.', '').'k';
        }

        return (string) $value;
    }

    public function welcome()
    {
        $libros = $this->readCsv('libro.csv');
        $prestamos = $this->readCsv('prestamo.csv');

        $totalLibros = count($libros);
        $totalUsuarios = User::count();
        $totalPrestamos = count($prestamos);
        $multas = count(array_filter($prestamos, function ($row) {
            return isset($row['multa'])
                && is_numeric($row['multa'])
                && (float) $row['multa'] > 0;
        }));

        $porcentajeMultas = $totalPrestamos > 0 ? round(($multas / $totalPrestamos) * 100, 1) : 0;

        $stockSaludable = count(array_filter($libros, function ($row) {
            return isset($row['stock'])
                && is_numeric($row['stock'])
                && (int) $row['stock'] > 2;
        }));

        $disponibilidadStock = $totalLibros > 0 ? round(($stockSaludable / $totalLibros) * 100, 1) : 0;

        return view('welcome', [
            'panelStats' => [
                'registros' => $this->formatCompactNumber($totalLibros),
                'disponibilidad' => $disponibilidadStock.'%',
                'acceso' => '24/7',
                'libros' => $this->formatCompactNumber($totalLibros),
                'usuarios' => $this->formatCompactNumber($totalUsuarios),
                'prestamos' => $this->formatCompactNumber($totalPrestamos),
                'multas' => $porcentajeMultas.'%',
            ],
        ]);
    }

    public function usuarios()
    {
        $usuarios = User::query()
            ->latest('created_at')
            ->get();

        $usuariosVerificados = User::query()->whereNotNull('email_verified_at')->count();

        return view('usuarios.index', [
            'usuarios' => $usuarios,
            'usuariosVerificados' => $usuariosVerificados,
            'totalUsuarios' => $usuarios->count(),
        ]);
    }

    public function index()
    {
        $umbralBajoStock = 2;
        $hoy = now()->format('Y-m-d');

        $libros = $this->readCsv('libro.csv');
        $prestamos = $this->readCsv('prestamo.csv');

        $totalLibros = count($libros);
        $totalUsuarios = User::count();

        $prestamosActivos = count(array_filter($prestamos, function ($row) {
            return empty(trim((string) ($row['fecha_devolucion'] ?? '')));
        }));

        $librosBajoStock = count(array_filter($libros, function ($row) use ($umbralBajoStock) {
            return isset($row['stock'])
                && is_numeric($row['stock'])
                && (int) $row['stock'] <= $umbralBajoStock;
        }));

        $prestamosVencidos = count(array_filter($prestamos, function ($row) use ($hoy) {
            $fechaLimite = trim((string) ($row['fecha_limite'] ?? ''));
            $fechaDevolucion = trim((string) ($row['fecha_devolucion'] ?? ''));

            return $fechaLimite !== ''
                && $fechaDevolucion === ''
                && $fechaLimite < $hoy;
        }));

        $multasPendientes = array_sum(array_map(function ($row) {
            $multa = trim((string) ($row['multa'] ?? ''));

            return $multa !== '' && is_numeric($multa) && (float) $multa > 0 ? (float) $multa : 0;
        }, array_filter($prestamos, function ($row) {
            return empty(trim((string) ($row['fecha_devolucion'] ?? '')))
                && isset($row['multa'])
                && is_numeric($row['multa'])
                && (float) $row['multa'] > 0;
        })));

        $tasaVencimiento = $prestamosActivos > 0 ? round(($prestamosVencidos / $prestamosActivos) * 100, 1) : 0;
        $usoCatalogo = $totalLibros > 0 ? round(($prestamosActivos / $totalLibros) * 100, 1) : 0;
        $stockSaludable = count(array_filter($libros, function ($row) use ($umbralBajoStock) {
            return isset($row['stock'])
                && is_numeric($row['stock'])
                && (int) $row['stock'] > $umbralBajoStock;
        }));
        $disponibilidadStock = $totalLibros > 0 ? round(($stockSaludable / $totalLibros) * 100, 1) : 0;

        return view('dashboard', [
            'totalLibros' => $totalLibros,
            'totalUsuarios' => $totalUsuarios,
            'prestamosActivos' => $prestamosActivos,
            'librosBajoStock' => $librosBajoStock,
            'prestamosVencidos' => $prestamosVencidos,
            'multasPendientes' => $multasPendientes,
            'tasaVencimiento' => $tasaVencimiento,
            'usoCatalogo' => $usoCatalogo,
            'disponibilidadStock' => $disponibilidadStock,
            'stockSaludable' => $stockSaludable,
        ]);
    }
}