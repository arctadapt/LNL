<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Siswa;
use App\Models\Tamu;
use App\Models\PerpindahanKelas;
use App\Models\Kelas;
use Illuminate\Support\Facades\Response;
use PDF;

class keluarKampusController extends Controller
{
    public function index(Request $request)
    {
        $izins = Izin::latest()->with('siswa')->get();
        $perpindahanKelas = PerpindahanKelas::all();
        $kelas = Kelas::all();
        $siswas = Siswa::all();

        return view('home', compact('izins', 'siswas', 'perpindahanKelas', 'kelas'));
    }

    public function storePindahkelas(Request $request)
    {
        $validatedData = $request->validate([
            'kelas_id' => 'required|exists:kelas,id',
            'jumlah_siswa' => 'required|integer|min:1',
            'mapel' => 'required|string|max:255',
        ]);

        // Create PerpindahanKelas record
        $perpindahanKelas = PerpindahanKelas::create($validatedData);

        // Generate PDF content with eager loading for perpindahan_kelas (if needed)
        $pdf = PDF::loadView('pdf.perpindahan_kelas', compact('perpindahanKelas'));

        // Set PDF download headers
        $filename = 'perpindahan_kelas_' . $perpindahanKelas->id . '.pdf';
        $response = Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);

        // Download PDF
        return $response;
    }

    public function storeIzinkeluar(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'required|exists:siswas,id',
            'alasan' => 'required|string|max:255',
            'mapel' => 'required|string|max:255',
        ]);

        $pdfFiles = [];

        foreach ($validatedData['siswa_id'] as $siswaId) {
            $izin = Izin::create([
                'siswa_id' => $siswaId,
                'alasan' => $validatedData['alasan'],
                'mapel' => $validatedData['mapel'],
            ]);

            $pdf = PDF::loadView('pdf.surat_izin', compact('izin'));
            $filename = 'suratizin-' . $izin->id . '.pdf';

            // Ensure the directory exists
            $directory = public_path('pdf');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // Save the PDF file
            $pdf->save($directory . '/' . $filename);

            $pdfFiles[] = url('pdf/' . $filename); // Tambahkan URL file PDF ke array
        }

        // Return array of PDF file URLs
        return response()->json(['pdf_files' => $pdfFiles]);
    }



    public function storeSuratTamu(Request $request)
    {
        $validatedData = $request->validate([
            'identitas' => 'nullable',
            'nama' => 'required',
            'darimana' => 'nullable',
            'kemana' => 'required',
        ]);

        // Create PerpindahanKelas record
        $tamu = Tamu::create($validatedData);

        // Generate PDF content with eager loading for perpindahan_kelas (if needed)
        $pdf = PDF::loadView('pdf.surat_tamu', compact('tamu'));

        // Set PDF download headers
        $filename = 'surat_tamu' . $tamu->id . '.pdf';
        $response = Response::make($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);

        // Download PDF
        return $response;
    }

}
