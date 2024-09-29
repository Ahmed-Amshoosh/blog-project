<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyStatistic extends Model
{
    use HasFactory;
    protected $fillable = ['date', 'visitors', 'views'];
    public function getStatistics()
    {
        $statistics = DailyStatistic::whereBetween('date', [Carbon::now()->subMonth(), Carbon::now()])
            ->get()
            ->groupBy('date')
            ->map(function ($row) {
                return [
                    'visitors' => $row->sum('visitors'),
                    'views' => $row->sum('views'),
                ];
            });

        return view('your-view', compact('statistics'));
    }
}
