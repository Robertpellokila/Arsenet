<?php

namespace App\Filament\Resources\OrderResource\Widgets;

use App\Models\Order;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class OrdersPerMonthChart extends ChartWidget
{
    protected static ?string $heading = 'Order Per Month';

    protected int | string | array $columnSpan = 'full';


    protected function getData(): array
    {

        

        $data = Trend::model(Order::class)
        ->between(
            start: now()->startOfYear(),
            end: now()->endOfYear(),
        )
        ->perMonth()
        ->count();

        
 
    return [
        'datasets' => [
            [
                'label' => 'Order',
                'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
            ],
        ],
        'labels' => $data->map(fn (TrendValue $value) => $value->date),
    ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}