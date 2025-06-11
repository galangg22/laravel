<?php

namespace App\Filament\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets;

class Dashboard extends BaseDashboard
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    
    protected static string $view = 'filament.pages.dashboard';

    protected function getHeaderWidgets(): array
    {
        return [
            // Widget yang akan ditampilkan di bagian atas
            Widgets\AccountWidget::class,
            Widgets\FilamentInfoWidget::class,
        ];
    }

    protected function getFooterWidgets(): array
    {
        return [
            // Widget yang akan ditampilkan di bagian bawah
        ];
    }

    protected function getColumns(): int | array
    {
        return 2; // Jumlah kolom untuk layout widget
    }
}
