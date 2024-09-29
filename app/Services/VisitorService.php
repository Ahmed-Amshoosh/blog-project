<?php
namespace App\Services;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VisitorService
{
    public function trackVisitor()
    {
        $ip = request()->ip();  // Get the IP address of the visitor
        $date = Carbon::today()->toDateString();  // Get today's date

        // Check if this IP has visited today
        $visitorExists = DB::table('visitors')
            ->where('ip', $ip)
            ->where('date', $date)
            ->exists();

        // If not, insert a new record
        if (!$visitorExists) {
            DB::table('visitors')->insert([
                'ip' => $ip,
                'date' => $date,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
