<?php

namespace App\Filament\Widgets;

use App\Models\Course;
use App\Models\IncriptionStudiant;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Usuarios', User::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('success'),
            Stat::make('cursos Disponibles', Course::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([17, 2, 10, 3, 15, 4, 3])
            ->color('info'),
            Stat::make('Inscripciones a Cursos', IncriptionStudiant::count())
            ->descriptionIcon('heroicon-m-arrow-trending-up')
            ->chart([7, 2, 10, 3, 15, 4, 17])
            ->color('danger'),
        ];
    }
}
