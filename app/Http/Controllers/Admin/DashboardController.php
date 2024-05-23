<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratTerlambat;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $terlambats = SuratTerlambat::whereMonth('created_at', Carbon::now()->month)->orderby('created_at', 'desc')->paginate(5);
        $guests = Tamu::whereMonth('created_at', Carbon::now()->month)->orderby('created_at', 'desc')->get();

        $startOfWeek = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $endOfWeek = Carbon::now()->endOfWeek(Carbon::FRIDAY);

        $daysOfWeek = [
            'Monday' => 'Senin',
            'Tuesday' => 'Selasa',
            'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis',
            'Friday' => 'Jumat',
            // 'Saturday' => 'Sabtu',
            // 'Sunday' => 'Minggu'
        ];

        $data = collect();
        $currentDate = $startOfWeek;

        while ($currentDate <= $endOfWeek) {
            $dayData = SuratTerlambat::whereDate('created_at', $currentDate->format('Y-m-d'))->get();
            $data->push([
                'day' => $daysOfWeek[$currentDate->format('l')], // Translate day to Indonesian
                'entries' => $dayData // All entries for the day
            ]);
            $currentDate->addDay();
        }

        return view('admin.dashboard', compact('terlambats', 'guests', 'data'));
    }
}
