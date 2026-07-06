<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\User;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;

class StatsOverview extends StatsOverviewWidget
{
    use HasWidgetShield;

    protected static ?int $sort = 1;
    // protected int | string | array $columnSpan = 'full';

    protected function getStats(): array
    {
        $totalProjects = Project::count();
        $publishedProjects = Project::where('pin', true)->count();
        $draftProjects = Project::where('pin', false)->count();

        $totalUsers = User::count();
        $newUsersThisMonth = User::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $projectsThisMonth = Project::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->count();

        $totalVisitors = Visitor::count();
        $visitorsThisMonth = Visitor::whereMonth('visited_at', now()->month)
            ->whereYear('visited_at', now()->year)
            ->count();

        return [
            Stat::make('Total Projects', $totalProjects)
                ->description($projectsThisMonth . ' projects this month')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('primary')
                ->chart([
                    Project::whereMonth('created_at', now()->subMonths(5))->count(),
                    Project::whereMonth('created_at', now()->subMonths(4))->count(),
                    Project::whereMonth('created_at', now()->subMonths(3))->count(),
                    Project::whereMonth('created_at', now()->subMonths(2))->count(),
                    Project::whereMonth('created_at', now()->subMonths(1))->count(),
                    $projectsThisMonth,
                ]),

            Stat::make('Project yang di Pin', $publishedProjects)
                ->description($draftProjects . ' Project tidak di Pin')
                ->descriptionIcon('heroicon-m-check-circle')
                ->color('success')
                ->chart([
                    Project::where('pin', true)->whereMonth('created_at', now()->subMonths(5))->count(),
                    Project::where('pin', true)->whereMonth('created_at', now()->subMonths(4))->count(),
                    Project::where('pin', true)->whereMonth('created_at', now()->subMonths(3))->count(),
                    Project::where('pin', true)->whereMonth('created_at', now()->subMonths(2))->count(),
                    Project::where('pin', true)->whereMonth('created_at', now()->subMonths(1))->count(),
                    $publishedProjects,
                ]),

            Stat::make('Total Users', $totalUsers)
                ->description($newUsersThisMonth . ' User baru pada bulan ini')
                ->descriptionIcon('heroicon-m-users')
                ->color('info')
                ->chart([
                    User::whereMonth('created_at', now()->subMonths(5))->count(),
                    User::whereMonth('created_at', now()->subMonths(4))->count(),
                    User::whereMonth('created_at', now()->subMonths(3))->count(),
                    User::whereMonth('created_at', now()->subMonths(2))->count(),
                    User::whereMonth('created_at', now()->subMonths(1))->count(),
                    $newUsersThisMonth,
                ]),

            Stat::make('Total Pengunjung', $totalVisitors)
                ->description($visitorsThisMonth . ' Pengunjung pada bulan ini')
                ->descriptionIcon('heroicon-m-eye')
                ->color('danger')
                ->chart([
                    Visitor::whereMonth('visited_at', now()->subMonths(5)->month)
                        ->whereYear('visited_at', now()->subMonths(5)->year)
                        ->count(),
                    Visitor::whereMonth('visited_at', now()->subMonths(4)->month)
                        ->whereYear('visited_at', now()->subMonths(4)->year)
                        ->count(),
                    Visitor::whereMonth('visited_at', now()->subMonths(3)->month)
                        ->whereYear('visited_at', now()->subMonths(3)->year)
                        ->count(),
                    Visitor::whereMonth('visited_at', now()->subMonths(2)->month)
                        ->whereYear('visited_at', now()->subMonths(2)->year)
                        ->count(),
                    Visitor::whereMonth('visited_at', now()->subMonths(1)->month)
                        ->whereYear('visited_at', now()->subMonths(1)->year)
                        ->count(),
                    $visitorsThisMonth,
                ]),

            Stat::make('Total Gallery', \App\Models\GalleriesProject::count())
                ->description('Total project images')
                ->descriptionIcon('heroicon-m-photo')
                ->color('warning'),
        ];
    }
}
