@extends('layouts.navadmin')

@section('content')
    <div class="p-3 mx-4 card">
        <form method="GET" action="{{ route('filter.guest') }}">
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
                    <td>Dari</td>
                    <td>Tujuan</td>
                    <td>Waktu</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($guests as $guest)
                    <tr>
                        <td>{{ $guest->nama }}</td>
                        <td>{{ $guest->darimana }}</td>
                        <td>{{ $guest->kemana }}</td>
                        <td>
                            {{ $guest->created_at->locale('id')->translatedFormat('d F Y') . ' / ' . $guest->created_at->format('H:i T') }}
                        </td>
                    </tr>
                @empty
                    <div class="mx-auto pb-3">
                        Tidak Ada Tamu Hari Ini
                    </div>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
