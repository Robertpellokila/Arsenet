<?php

namespace App\Filament\Resources\ServisResource\Pages;

use App\Filament\Resources\ServisResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListServis extends ListRecords
{
    protected static string $resource = ServisResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
