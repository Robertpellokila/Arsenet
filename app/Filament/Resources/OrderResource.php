<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\EnumColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_pelanggan')
                    ->label('Nama Pelanggan')
                    ->required(),
                TextInput::make('email_pelanggan')
                    ->label('Email Pelanggan')
                    ->email()
                    ->required(),
                TextInput::make('telepon_pelanggan')
                    ->label('Telepon Pelanggan')
                    ->tel()
                    ->required(),
                Select::make('paket_id')  // pastikan field ini sesuai dengan nama kolom foreign key
                    ->label('Paket')
                    ->relationship('paket', 'nama')
                    ->required()
                    ->disabled(),
                TextInput::make('total_harga')
                    ->label('Total Harga')
                    ->required()
                    ->prefix('Rp.') // Menambahkan simbol mata uang

                    ->formatStateUsing(fn ($state) => number_format($state, 0, ',', '.'))  // format tampilan tanpa desimal
                    ->afterStateUpdated(fn ($state, $set) => $set('price', str_replace('.', '', $state)))  // pastikan tidak ada titik pemisah ribuan saat update
                    ->helperText('Harga dalam IDR')->disabled(),
                    ToggleButtons::make('status')
                        ->inline()
                        ->default('pending')
                        ->required()
                        ->options([
                            'pending' => 'Pending',
                            'completed' => 'Completed',
                            'active' => 'Active',
                            'canceled' => 'Cancelled',
                        ])
                        ->colors([
                            'pending' => 'warning',
                            'completed' => 'info',
                            'active' => 'success',
                            'canceled' => 'danger',
                        ])
                        ->icons([
                            'pending' => 'heroicon-m-arrow-path',
                            'completed' => 'heroicon-m-check-badge',
                            'active' => 'heroicon-m-check-badge',
                            'canceled' => 'heroicon-m-x-circle',
                        ]),
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_pelanggan')->label('Nama Pelanggan')->searchable(),
                TextColumn::make('email_pelanggan')->label('Email Pelanggan'),
                TextColumn::make('telepon_pelanggan')->label('Telepon Pelanggan'),
                TextColumn::make('paket.nama')->label('Paket Layanan')->searchable(),
                TextColumn::make('user.name')->label('User'),
                SelectColumn::make('status')
                ->options([
                    'pending' => 'Pending',
                    'completed' => 'Completed',
                    'active' => 'Active',
                    'canceled' => 'Cancelled',                
                ])
                ->searchable()
                ->sortable(),
                TextColumn::make('total_harga')->label('Total Harga')
                ->sortable()
                ->money('idr', true)  // Gunakan format uang dengan satuan IDR
                ->formatStateUsing(fn ($state) => 'Rp ' . number_format($state, 0, ',', '.')),
                TextColumn::make('created_at')->label('Dipesan Pada')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\DeleteAction::make(),
            ])
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}