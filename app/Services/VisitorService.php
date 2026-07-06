<?php

namespace App\Services;

use App\Models\Visitor;
use Carbon\Carbon;

class VisitorService
{
    /**
     * Create a new class instance.
     */
    public function __construct() {}

    public function getTodayVisitors()
    {
        return Visitor::today()->count();
    }

    public function getUniqueTodayVisitors()
    {
        return Visitor::today()->distinct('ip_address')->count('ip_address');
    }

    public function getThisWeekVisitors()
    {
        return Visitor::thisWeek()->count();
    }

    public function getThisMonthVisitors()
    {
        return Visitor::thisMonth()->count();
    }

    public function getTotalVisitors()
    {
        return Visitor::count();
    }

    public function getTotalUniqueVisitors()
    {
        return Visitor::distinct('ip_address')->count('ip_address');
    }

    public function getLast7DaysVisitors()
    {
        $data = [];
        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $count = Visitor::whereDate('visited_at', $date)->count();
            $data[$date->format('d M')] = $count;
        }
        return $data;
    }

    public function getLast12MonthsVisitors()
    {
        $data = [];
        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $count = Visitor::whereMonth('visited_at', $date->month)
                ->whereYear('visited_at', $date->year)
                ->count();
            $data[$date->format('M Y')] = $count;
        }
        return $data;
    }
}
