<?php

namespace App\Filament\Resources\OrderResource\Pages;

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\OrderResource\Widgets\OrdersPerMonthChart;
use App\Filament\Resources\OrderResource\Widgets\RevenueWidget;
use App\Filament\Resources\OrderResource\Widgets\ReviewOrder;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListOrders extends ListRecords
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    
    protected function getFooterWidgets(): array
    {
        return [
          OrdersPerMonthChart::class  
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return [
          ReviewOrder::class,
          RevenueWidget::class,  
        ];
    }
    
}