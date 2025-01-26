<?php

namespace App\Filament\Resources\FiturResource\Pages;

use App\Filament\Resources\FiturResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFitur extends EditRecord
{
    protected static string $resource = FiturResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
