<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget\Stat;

class RevenueWidget extends BaseWidget
{

    protected int | string | array $columnSpan = 'full';
    protected function getStats(): array
    {
        $totalPendapatan = Order::where('status', 'active')->sum('total_harga');
        return [
            Card::make('Total Pendapatan', 'Rp. ' . number_format($totalPendapatan, 0, ',', '.'))->description('Dari semua order yang sudah aktif')->color('success'),
        ];
    }

    
}