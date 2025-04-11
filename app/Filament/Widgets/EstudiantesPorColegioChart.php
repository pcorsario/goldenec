<?php

namespace App\Filament\Widgets;

use App\Models\Estudiante;
use Filament\Widgets\ChartWidget;

class EstudiantesPorColegioChart extends ChartWidget
{
    protected static ?string $heading = 'Distribución de Estudiantes por Colegio';

    protected function getData(): array
    {
        $estudiantes = Estudiante::selectRaw('colegio, count(*) as total')
            ->whereIn('colegio', [
                'ALESSANDRO VOLTA',
                'JULIO MORENO ESPINOZA', 
                'AUGUSTO ARIAS'
            ])
            ->groupBy('colegio')
            ->get();

        return [
            'labels' => $estudiantes->pluck('colegio')->toArray(),
            'datasets' => [
                [
                    'label' => 'Estudiantes',
                    'data' => $estudiantes->pluck('total')->toArray(),
                    'backgroundColor' => [
                        '#3B82F6', // Azul
                        '#8B5CF6', // Violeta
                        '#EC4899'  // Rosa
                    ],
                    'borderColor' => '#ffffff',
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'pie'; // Puedes cambiar a 'bar', 'line', etc.
    }
}
