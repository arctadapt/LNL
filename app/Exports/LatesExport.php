<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LatesExport implements FromCollection, WithHeadings
{
    protected $terlambats;

    public function __construct($terlambats)
    {
        // Only select the desired columns
        $this->terlambats = $terlambats->map(function ($terlambat) {
            return [
                'nis' => $terlambat->siswa->nis,
                'nama' => $terlambat->siswa->nama,
                'kelas' => $terlambat->siswa->kelas,
                'jurusan' => $terlambat->siswa->jurusan,
                'waktu' => $terlambat->created_at->locale('id')->translatedFormat('d F Y') .
                    ' / ' .
                    $terlambat->created_at->format('H:i T')
            ];
        });
    }

    public function collection()
    {
        return collect($this->terlambats);
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama',
            'Kelas',
            'Jurusan',
            'Waktu'
        ];
    }
}
