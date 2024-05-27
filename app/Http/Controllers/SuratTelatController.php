<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\SuratTerlambat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use PDF;

class SuratTelatController extends Controller
{
    public function index()
    {
        $siswa = siswa::get();

        return view('terlambat', compact('siswa'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'jamMasuk' => 'nullable|date_format:H:i',
            'alasan' => 'nullable|string|max:255',
        ]);

        $now = Carbon::now();

        // Create SuratTerlambat record
        $suratTerlambat = SuratTerlambat::create([
            'siswa_id' => $request->siswa_id,
            'jamMasuk' => $now,
            'alasan' => $request->alasan,
        ]);

        // Generate PDF content
        $pdf = PDF::loadView('pdf.surat_terlambat', compact('suratTerlambat'));
        $filename = 'surat_terlambat_' . $suratTerlambat->id . '.pdf';

        // Ensure the directory exists
        $directory = public_path('pdf');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        // Save the PDF file
        $pdf->save($directory . '/' . $filename);

        // Redirect to a route that shows the PDF
        return redirect()->route('showPdf', ['filename' => $filename]);
    }
}
