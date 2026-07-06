<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use BezhanSalleh\FilamentShield\Traits\HasWidgetShield;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class VisitorChart extends ChartWidget
{
    use HasWidgetShield;

    protected ?string $heading = 'Statistik Pengunjung (12 Bulan Terakhir)';
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = [];
        $labels = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = Visitor::whereMonth('visited_at', $date->month)
                ->whereYear('visited_at', $date->year)
                ->count();
            $data[] = $count;
            $labels[] = $date->format('M Y');
        }

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Pengunjung',
                    'data' => $data,
                    'borderColor' => '#0dad35',
                    'backgroundColor' => 'rgba(13, 173, 53, 0.1)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1,
                    ],
                ],
            ],
        ];
    }
}
