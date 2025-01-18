<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Izin;
use App\Models\Siswa;
use App\Models\Tamu;
use App\Models\PerpindahanKelas;
use App\Models\Kelas;
use PDF;
use Illuminate\Support\Facades\Mail;

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

        // Generate PDF content
        $pdf = PDF::loadView('pdf.perpindahan_kelas', compact('perpindahanKelas'));
        $filename = 'perpindahan_kelas_' . $perpindahanKelas->id . '.pdf';

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

    public function storeIzinkeluar(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => 'required|array',
            'siswa_id.*' => 'required|exists:siswas,id',
            'alasan' => 'required|max:255',
            'mapel' => 'required|string|max:255',
        ]);

        // Loop through each siswa_id and create a PDF for each
        $pdfFiles = [];
        foreach ($validatedData['siswa_id'] as $siswaId) {
            $izinData = [
                'siswa_id' => $siswaId,
                'alasan' => $validatedData['alasan'],
                'mapel' => $validatedData['mapel'],
            ];

            // Create Izin record
            $izin = Izin::create($izinData);

            // Generate PDF content
            $pdf = PDF::loadView('pdf.surat_izin', compact('izin'));
            $filename = 'suratizin-' . $izin->id . '.pdf';

            // Ensure the directory exists
            $directory = public_path('pdf');
            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            // Save the PDF file
            $pdf->save($directory . '/' . $filename);

            // Add URL of the PDF file to the array
            $pdfFiles[] = url('pdf/' . $filename);
        }

        // Return array of PDF file URLs
        return response()->json(['pdf_files' => $pdfFiles]);
    }

    public function storeSuratTamu(Request $request)
    {
        $validatedData = $request->validate([
            'identitas' => 'nullable|string|max:255',
            'nama' => 'required|string|max:255',
            'darimana' => 'nullable|string|max:255',
            'kemana' => 'required|string|max:255',
            'keperluan' => 'required|string|max:255',
            'captured_photo' => 'nullable|string'
        ]);
    
        // Simpan data tamu ke database
        $tamu = Tamu::create($validatedData);
    
        // Proses foto yang di-capture
        $photoData = null;
        if ($request->has('captured_photo') && $request->captured_photo) {
            // Dekode base64 image
            $imageData = $request->captured_photo;
            
            // Pisahkan base64 header jika ada
            if (strpos($imageData, 'base64,') !== false) {
                list($type, $imageData) = explode('base64,', $imageData);
            }
            
            // Decode base64 image
            $photoData = base64_decode($imageData);
        }
    
        // Generate PDF dengan foto yang sudah di-decode
        $pdf = PDF::loadView('pdf.surat_tamu', [
            'tamu' => $tamu, 
            'photoData' => $photoData ? 'data:image/jpeg;base64,'.base64_encode($photoData) : null
        ]);
    
        $filename = 'surat_tamu_' . $tamu->id . '.pdf';
    
        // Simpan PDF ke folder public/pdf
        $directory = public_path('pdf');
        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }
        $pdf->save($directory . '/' . $filename);
    
        // Kirim email ke tujuan berdasarkan "kemana"
        $toEmail = $this->getEmailByDestination($validatedData['kemana']);
        if ($toEmail) {
            Mail::send('emails.surat_tamu', $validatedData, function ($message) use ($toEmail, $filename) {
                $message->to($toEmail)
                        ->subject('Surat Tamu Baru')
                        ->attach(public_path('pdf/' . $filename)); // Lampirkan PDF
            });
        }
    
        // Redirect ke halaman untuk melihat PDF
        return redirect()->route('showPdf', ['filename' => $filename])
                         ->with('success', 'Data tamu berhasil disimpan dan email terkirim.');
    }

    private function getEmailByDestination($destination)
    {
        $emailMap = [
            'Kepala Sekolah' => 'mochammadsyamihardiana@gmail.com',
            'Hubin' => 'hubin@sekolah.com',
            'Tata Usaha' => 'tu@sekolah.com',
            'Keuangan' => 'keuangan@sekolah.com',
            'Kaprog PPLG' => '',
            'Kaprog MPLB' => '',
            'Kaprog DKV' => '',
            'Kaprog TJKT' => '',
            'Kaprog HR' => '',
            'Kaprog TMP' => '',
            'Kaprog TKR' => '',
            'Kaprog TSM' => ''
            // Tambahkan email lainnya sesuai kebutuhan
        ];

        return $emailMap[$destination] ?? null;
    }

    public function showPdf($filename)
    {
        $filePath = public_path('pdf/' . $filename);

        if (!file_exists($filePath)) {
            abort(404);
        }

        return view('pdf.show', compact('filename'));
    }
}