<?php

namespace App\Filament\Resources\UserResource\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class UserStatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count()), 
            Stat::make('Total Admins', User::where('role', User::ROLE_ADMIN)->count()), 
            Stat::make('Total Petugas', User::where('role', User::ROLE_PETUGAS)->count()), 
        ];
    }
}