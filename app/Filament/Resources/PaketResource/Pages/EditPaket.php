<?php

namespace App\Filament\Resources\PaketResource\Pages;

use App\Filament\Resources\PaketResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPaket extends EditRecord
{
    protected static string $resource = PaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
