<?php

namespace App\Filament\Widgets;

use App\Models\Estudiante;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class EstudiantesStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Estudiantes', Estudiante::count())
                ->description('Registros en el sistema')
                ->descriptionIcon('heroicon-o-users')
                ->color('success')
                ->chart([7, 3, 5, 10, 15]) // Datos opcionales para gráfico
                ->extraAttributes([
                    'class' => 'border-l-4 border-success-500' // Borde izquierdo verde
                ]),
        ];
    }
}