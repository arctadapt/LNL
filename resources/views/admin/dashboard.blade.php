@extends('layouts.navadmin')

@section('content')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    <div class="">
        <div class="mx-4">
            <h2>
                <a href="{{ route('data.terlambat') }}" class="text-black text-3xl">
                    Data Siswa Yang Terlambat
                </a>
            </h2>
            <div class="row mx-1 mt-2">
                <div class=" bg-white shadow-md col">
                    <div class="w-full p-2"><canvas id="acquisitions"></canvas></div>
                </div>

                <div class="col">
                    <table class="bg-white table table-striped w-full">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jam Masuk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($terlambats as $terlambat)
                                <tr>
                                    <td>{{ $terlambat->siswa->nama }}</td>
                                    <td>{{ $terlambat->siswa->kelas . ' ' . $terlambat->siswa->jurusan }}</td>
                                    <td>{{ $terlambat->created_at->format('H:i T') }}</td>
                                </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php
        Carbon\Carbon::setLocale('id');
        ?>

        <div class="mx-4 mt-4">
            <h2>
                <a href="{{ route('data.guest') }}" class="text-black text-3xl">Tamu Yang Datang Pada Bulan
                    <b>{{ Carbon\Carbon::now()->translatedFormat('F') }}</b>
                </a>
            </h2>
            <div class="mx-1 mt-2">
                <table class="bg-white table table-striped w-full">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Dari</th>
                            <th>Tujuan</th>
                            <th>Waktu</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($guests as $guest)
                            <tr>
                                <td>{{ $guest->nama }}</td>
                                <td>{{ $guest->darimana }}</td>
                                <td>{{ $guest->kemana }}</td>
                                <td>{{ $guest->created_at->locale('id')->translatedFormat('d F Y') . ' / ' . $guest->created_at->format('H:i T') }}
                                </td>
                            </tr>
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script type="module" src="acquisitions.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const data = <?php echo json_encode($data); ?>;

            const labels = data.map(row => row.day);
            const datasets = data.map(row => ({
                label: row.day,
                data: row.entries.map(entry => ({
                    x: entry.created_at, // Use the actual created_at time if needed
                    y: 1 // You can adjust this according to your data structure
                }))
            }));

            new Chart(document.getElementById('acquisitions'), {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Data Per Minggu',
                        data: datasets.map(dataset => dataset.data
                            .length) // Assuming we are counting entries per day
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Hari Perminggu'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Jumlah Entri'
                            }
                        }
                    }
                }
            });
        });
    </script>
@endsection
