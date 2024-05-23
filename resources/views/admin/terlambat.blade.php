@extends('layouts.navadmin')

@section('content')
    <div class="p-3 mx-4 card">
        <form method="GET" action="{{ route('filter.terlambat') }}">
            <select name="interval">
                <option value="day" @if ($interval == 'day') selected @endif>Hari Ini</option>
                <option value="week" @if ($interval == 'week') selected @endif>Minggu Ini</option>
                <option value="month" @if ($interval == 'month') selected @endif>Bulan Ini</option>
            </select>
            <button type="submit">Filter</button>
        </form>
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
                @forelse ($terlambats as $terlambat)
                    <tr>
                        <td>{{ $terlambat->siswa->nama }}</td>
                        <td>{{ $terlambat->siswa->kelas . ' ' . $terlambat->siswa->jurusan }}</td>
                        <td>{{ $terlambat->alasan }}</td>
                        <td>
                            {{ $terlambat->created_at->locale('id')->translatedFormat('d F Y') .
                                ' / ' .
                                $terlambat->created_at->format('H:i T') }}
                        </td>
                    </tr>
                @empty
                    <div class="mx-auto pb-3">
                        Tidak Ada Siswa Yang Terlambat Hari Ini
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
