<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FiturResource\Pages;
use App\Filament\Resources\FiturResource\RelationManagers;
use App\Models\Fitur;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FiturResource extends Resource
{
    protected static ?string $navigationGroup = 'Kelola Fitur';

    protected static ?string $model = Fitur::class;

    protected static ?string $navigationIcon = 'heroicon-o-funnel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                ->required(),
                TextInput::make('deskripsi')
                ->maxLength(255)
                ->required(),
                FileUpload::make('gambar') // Use FileUpload instead of Image
                ->required()
                ->disk('public')
                ->directory('fitur')
                ->preserveFilenames(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            TextColumn::make('nama')
                ->label('Nama'),
            
            TextColumn::make('deskripsi')
                ->label('Deskripsi'),
            
            ImageColumn::make('gambar')
                ->label('Gambar')
                ->size(100)
                ->sortable(),
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
            'index' => Pages\ListFiturs::route('/'),
            'create' => Pages\CreateFitur::route('/create'),
            'edit' => Pages\EditFitur::route('/{record}/edit'),
        ];
    }
}