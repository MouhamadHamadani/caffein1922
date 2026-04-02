<?php

namespace App\Filament\Widgets;

use App\Models\ContactMessage;
use App\Models\MenuItem;
use App\Models\Reservation;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Pending Reservations', Reservation::where('status', 'pending')->count())
                ->description('Reservations awaiting confirmation')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning'),
            Stat::make('Unread Messages', ContactMessage::where('is_read', false)->count())
                ->description('New contact inquiries')
                ->descriptionIcon('heroicon-m-envelope')
                ->color('danger'),
            Stat::make('Total Menu Items', MenuItem::count())
                ->description('Items in your digital menu')
                ->descriptionIcon('heroicon-m-beaker')
                ->color('success'),
            Stat::make('Google Rating', '4.5 ★')
                ->description('From 349 reviews')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),
        ];
    }
}
