<?php

namespace App\Filament\Resources\PaketResource\Widgets;

use App\Filament\Resources\PaketResource;
use App\Models\Paket;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class PaketTerakhirWidget extends BaseWidget
{
    protected int | string | array $columnSpan = 'full';
    
    public function table(Table $table): Table
    {
        return $table
            ->query(
                fn () => Paket::whereDate('created_at', '>', now()->subDays(14)->startOfDay())
            )
            ->columns([
                TextColumn::make('nama')->label('Nama'),
                TextColumn::make('deskripsi')
            ->label('Deskripsi')
            ->getStateUsing(function ($record) {
                $words = explode(' ', $record->deskripsi); // Membagi teks menjadi array kata
                $limitedWords = array_slice($words, 0, 3); // Mengambil hanya 3 kata pertama
                return implode(' ', $limitedWords) . (count($words) > 3 ? '...' : ''); // Menambahkan '...' jika lebih dari 3 kata
            }),
                TextColumn::make('created_at')->label('Created At')->dateTime()->sortable(),
            ])
            ->actions([
                Action::make('View')
                ->url(fn (Paket $record) : string => PaketResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}