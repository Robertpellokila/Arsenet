<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PaketResource\Pages;
use App\Filament\Resources\PaketResource\RelationManagers;
use App\Models\Paket;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PaketResource extends Resource
{

    protected static ?string $navigationGroup = 'Kelola Paket';
    protected static ?string $model = Paket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->required(),
                TextInput::make('deskripsi')
                    ->required(),
                FileUpload::make('gambar') // Use FileUpload instead of Image
                    ->required()
                    ->disk('public')
                    ->directory('pakets')
                    ->preserveFilenames(),
                TextInput::make('harga')
                    ->required()
                    ->numeric() // Validasi agar hanya menerima angka
                    ->label('Harga')
                    ->prefix('Rp.') // Menambahkan simbol mata uang
                    ->minValue(0) // Harga minimum 0
                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.'))  // format tampilan tanpa desimal
    ->afterStateUpdated(fn ($state, $set) => $set('price', str_replace('.', '', $state)))  // pastikan tidak ada titik pemisah ribuan saat update
    ->helperText('Harga dalam IDR'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama')
                ->label('Nama Paket'),
            
            TextColumn::make('deskripsi')
                ->label('Deskripsi'),
            
            ImageColumn::make('gambar')
                ->label('Gambar')
                ->size(100)
                ->sortable(),
            
            TextColumn::make('harga')
                ->label('Harga')
                ->sortable()
                ->money('idr', true)  // Gunakan format uang dengan satuan IDR
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')), // Menampilkan dalam format uang
            
            TextColumn::make('created_at')
                ->label('Created At')
                ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPakets::route('/'),
            'create' => Pages\CreatePaket::route('/create'),
            'edit' => Pages\EditPaket::route('/{record}/edit'),
        ];
    }
}