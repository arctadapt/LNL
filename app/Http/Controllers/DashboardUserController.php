<?php

namespace App\Http\Controllers;

use App\Models\Izin;
use App\Models\Kelas;
use App\Models\PerpindahanKelas;
use App\Models\siswa;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index(Request $request)
    {
        $izins = Izin::latest()->with('siswa')->get();
        $perpindahanKelas = PerpindahanKelas::all();
        $kelas = Kelas::all();
        $siswas = siswa::all();

        return view('dashboardUser', compact('izins', 'siswas', 'perpindahanKelas', 'kelas'));
    }
}
