<?php

namespace App\Filament\Widgets;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Open;
use App\Models\Purchase;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Published Books', Book::count()),
            Stat::make('Total Purchases', Purchase::count()),
            Stat::make('Total Clients', Customer::count()),
            Stat::make('Analytics', Open::count()),
        ];
    }
}
