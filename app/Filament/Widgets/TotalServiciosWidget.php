<?php
namespace App\Filament\Widgets;

use App\Models\Servicio;
use App\Models\Estudiante;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class TotalServiciosWidget extends BaseWidget
{
    protected function getHeading(): ?string
    {
        return 'Resumen de Servicios';
    }
    protected static ?int $sort = 2; // Orden en el dashboard

    protected function getStats(): array
    {
        $total = Servicio::sum('valor'); // Asegúrate que 'valor' sea el nombre correcto de tu columna
        
        return [
            Stat::make('Total Facturado', number_format($total, 2).' USD')
                ->description('Suma de todos los servicios')
                ->descriptionIcon('heroicon-o-currency-dollar')
                ->color('info')
                ->chart([7, 3, 4, 5, 6, 3, 5]) // Datos de ejemplo para gráfico
                ->extraAttributes([
                    'class' => 'border-l-4 border-green-500' // Borde izquierdo verde
                ]),
                
            // // Puedes añadir más estadísticas si necesitas
            // Stat::make('Servicios Activos', Servicio::where('activo', true)->count())
            //     ->color('primary'),
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

    protected function getColumns(): int
    {
        return 2; // o el valor que desees
    }
}