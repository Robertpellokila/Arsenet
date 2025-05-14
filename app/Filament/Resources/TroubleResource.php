<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TroubleResource\Pages;
use App\Filament\Resources\TroubleResource\RelationManagers;
use App\Models\Trouble;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TroubleResource extends Resource
{
    protected static ?string $model = Trouble::class;

    protected static ?string $navigationIcon = 'heroicon-o-exclamation-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Hidden::make('user_id')
                    ->default(auth()->id()),
                Select::make('user_id')
                    ->label('Pelapor')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->disabled(),
                TextInput::make('alamat')
                    ->label('Alamat')
                    ->required(),
                Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->required(),

                ToggleButtons::make('status')
                    ->inline()
                    ->default('pending')
                    ->required()
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'canceled' => 'Cancelled',
                    ])
                    ->colors([
                        'pending' => 'warning',
                        'completed' => 'success',
                        'canceled' => 'danger',
                    ])
                    ->icons([
                        'pending' => 'heroicon-m-arrow-path',
                        'completed' => 'heroicon-m-check-badge',
                        'canceled' => 'heroicon-m-x-circle',
                    ]),
                FileUpload::make('foto') // Use FileUpload instead of Image
                    ->required()
                    ->disk('public')
                    ->directory('troubles')
                    ->preserveFilenames()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user.name')
                    ->label('Pelapor')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('user.email')
                    ->label('Email')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('alamat')
                    ->label('Alamat')
                    ->searchable(),
                TextColumn::make('deskripsi')
                    ->label('Deskripsi'),
                SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'completed' => 'Completed',
                        'active' => 'Active',
                        'canceled' => 'Cancelled',
                    ])
                    ->searchable()
                    ->sortable(),
                ImageColumn::make('foto')
                    ->label('Foto')
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
            'index' => Pages\ListTroubles::route('/'),
            'create' => Pages\CreateTrouble::route('/create'),
            'edit' => Pages\EditTrouble::route('/{record}/edit'),
        ];
    }
}