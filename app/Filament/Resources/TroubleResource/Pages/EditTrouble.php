<?php

namespace App\Filament\Resources\TroubleResource\Pages;

use App\Filament\Resources\TroubleResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditTrouble extends EditRecord
{
    protected static string $resource = TroubleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
