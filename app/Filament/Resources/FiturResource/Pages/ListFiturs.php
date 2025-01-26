<?php

namespace App\Filament\Resources\FiturResource\Pages;

use App\Filament\Resources\FiturResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFiturs extends ListRecords
{
    protected static string $resource = FiturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
