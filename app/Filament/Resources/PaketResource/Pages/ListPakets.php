<?php

namespace App\Filament\Resources\PaketResource\Pages;

use App\Filament\Resources\PaketResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPakets extends ListRecords
{
    protected static string $resource = PaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}