<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Izin;
use App\Models\SuratTerlambat;
use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataSiswaController extends Controller
{
    public function index()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        $latesMonth = SuratTerlambat::whereMonth('created_at', Carbon::now()->month)->count();
        $latesWeek = SuratTerlambat::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $latesToday = SuratTerlambat::whereDate('created_at', Carbon::today())->count();

        $guestsMonth = Tamu::whereMonth('created_at', Carbon::now()->month)->count();
        $guestsWeek = Tamu::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $guestsToday = Tamu::whereDate('created_at', Carbon::today())->count();

        return view(
            'admin.data',
            compact('latesMonth', 'latesWeek', 'latesToday', 'guestsMonth', 'guestsWeek', 'guestsToday')
        );
    }

    public function izin()
    {
        $current = now();
        $startHour = 6;
        $startMinute = 45;

        $startMinutes = ($startHour * 60) + $startMinute;
        $currentMinutes = ($current->hour * 60) + $current->minute;
        $difference = $currentMinutes - $startMinutes;

        if ($difference < 0) {
            $difference += 1440;
        }

        $hour = intdiv($difference, 45) + 1;

        $surats = Izin::latest()->get();

        return view('admin.suratIzin', compact('surats', 'hour'));
    }

    public function terlambat()
    {
        $terlambats = SuratTerlambat::get();
        $interval = '';

        return view('admin.terlambat', compact('terlambats', 'interval'));
    }

    public function filterLate(Request $request)
    {
        $interval = $request->input('interval');

        switch ($interval) {
            case 'day':
                $terlambats = SuratTerlambat::whereDate('created_at', Carbon::today())->get();
                break;
            case 'week':
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();
                $terlambats = SuratTerlambat::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
                break;
            case 'month':
                $startOfMonth = Carbon::now()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();
                $terlambats = SuratTerlambat::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
                break;
            default:
                $terlambats = [];
                break;
        }

        return view('admin.terlambat', compact('terlambats', 'interval'));
    }

    public function guest()
    {
        $guests = Tamu::latest()->get();
        $interval = '';

        return view('admin.guest', compact('guests', 'interval'));
    }

    public function filterGuest(Request $request)
    {
        $interval = $request->input('interval');

        switch ($interval) {
            case 'day':
                $guests = Tamu::whereDate('created_at', Carbon::today())->get();
                break;
            case 'week':
                $startOfWeek = Carbon::now()->startOfWeek();
                $endOfWeek = Carbon::now()->endOfWeek();
                $guests = Tamu::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
                break;
            case 'month':
                $startOfMonth = Carbon::now()->startOfMonth();
                $endOfMonth = Carbon::now()->endOfMonth();
                $guests = Tamu::whereBetween('created_at', [$startOfMonth, $endOfMonth])->get();
                break;
            default:
                $guests = [];
                break;
        }

        return view('admin.guest', compact('guests', 'interval'));
    }
}
