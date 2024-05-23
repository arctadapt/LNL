<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\SuratTerlambat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class SuratTelatController extends Controller
{
    public function index() {
        $siswa = siswa::get();

        return view('terlambat', compact('siswa'));
    }

    public function store(Request $request) {
        $request->validate([
            'siswa_id' => 'required',
            'jamMasuk' => 'nullable',
            'alasan' => 'nullable',
        ]);

        $now = Carbon::now();

        SuratTerlambat::create([
            'siswa_id' => $request->siswa_id,
            'jamMasuk' => $now,
            'alasan' => $request->alasan,
        ]);

        return redirect()->back();
    }
}
