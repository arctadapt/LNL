@extends('layouts.navadmin')

@section('content')
    <div class="p-3 mx-4 card">
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>Nama</td>
                    <td>Kelas</td>
                    <td>Alasan</td>
                    <td>Waktu</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($surats as $surat)
                    <tr>
                        <td>{{ $surat->siswa->nama }}</td>
                        <td>{{ $surat->siswa->kelas . ' ' . $surat->siswa->jurusan }}</td>
                        <td>{{ $surat->alasan }}</td>
                        <td>
                            {{ $surat->created_at->locale('id')->translatedFormat('d F Y') . ' / ' . $surat->created_at->format('H:i T') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
