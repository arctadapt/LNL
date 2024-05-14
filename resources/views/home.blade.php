<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HOME</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/app.js'])
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha384-dT4h8a29xJzvmkMqbH7K5SrbJEYTw70gLF70Yg3dsV7CXFJbxCFPcK5Xs3Y6f8Dk" crossorigin="anonymous"> --}}
</head>

<body>

    {{-- <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-content-evenly " id="default-tab"
            data-tabs-toggle="#default-tab-content" role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">Izin Keluar</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Pindah Kelas</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-tab" data-tabs-target="#tamu" type="button" role="tab" aria-controls="dashboard"
                    aria-selected="false">Surat Tamu</button>
            </li>
        </ul>
    </div> --}}
    <div id="default-tab-content">
        <div class="hidden p-4 bg-white rounded-lg" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <form action="{{ route('keluar-kampus.storeIzinkeluar') }}" method="POST" id="createFormIzinkeluar">
                @csrf

                <div class="form-group">
                    <label for="siswa_id">Nama Siswa</label>
                    <select name="siswa_id[]" id="siswa_id" class="w-full" multiple required>
                        @foreach ($siswas as $siswa)
                            <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="alasan">Alasan</label>
                    <input type="text" name="alasan" class="form-control" id="alasan" required>
                </div>

                <div class="form-group">
                    <label for="mapel">Mapel</label>
                    <input type="text" name="mapel" class="form-control" id="mapel" required>
                </div>

                <div>
                    <button type="reset" class="text-white btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
        <div class="hidden p-4 bg-white rounded-lg " id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
            <form action="{{ route('keluar-kampus.storePindahkelas') }}" method="POST" id="createFormPerpindahankelas">
                @csrf
                <div class="">
                    <label for="kelas_id">Kelas</label>
                    <select name="kelas_id" id="kelas_id" class="w-full" required>
                        @foreach ($kelas as $kls)
                            <option value="{{ $kls->id }}">{{ $kls->kelas . ' - ' . $kls->jurusan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="jumlah_siswa">Jumlah Siswa</label>
                    <input type="number" name="jumlah_siswa" class="form-control" id="jumlah_siswa" required>
                </div>

                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <input type="text" name="mapel" class="form-control" id="mapel" required>
                </div>

                <div class="">
                    <button type="reset" class="text-white btn btn-warning">Reset</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="hidden p-4 bg-white rounded-lg " id="tamu" role="tabpanel" aria-labelledby="dashboard-tab">
        <form action="{{ route('keluar-kampus.storeSuratTamu') }}" method="POST" id="createFormSuratTamu">
            @csrf
            <div class="">
                <label for="nama">Nama</label>
                <input type="text" name="nama" class="form-control" id="nama" required>
            </div>

            <div class="form-group">
                <label for="darimana">Darimana</label>
                <input type="text" name="darimana" class="form-control" id="darimana" required>
            </div>

            <div class="form-group">
                <label for="kemana">Kemana</label>
                <input type="text" name="kemana" class="form-control" id="kemana" required>
            </div>

            <div class="">
                <button type="reset" class="text-white btn btn-warning">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    </div>

    {{--
    <div class="btn-container">
        <button class="px-5 py-2 text-white bg-blue-500 rounded-sm" data-toggle="modal"
            data-target="#createModalIzinkeluar">
            <i class="mr-2 fas fa-user-plus"></i> Izin Keluar
        </button>
        <button class="px-5 py-2 text-white bg-blue-500 rounded-sm" data-toggle="modal"
            data-target="#createModalPerpindahankelas">
            <i class="mr-2 fas fa-exchange-alt"></i> Perpindahan Kelas
        </button>
    </div>

    <!-- Create Modal Izin Perorang -->
    <div class="modal fade" id="createModalIzinkeluar" tabindex="-1" role="dialog"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Buat Izin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModalPerpindahankelas" tabindex="-1" role="dialog"
        aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Form Perpindahan Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div> --}}

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script>
        $(document).ready(function() {
            $('#siswa_id').select2({
                placeholder: 'Pilih Nama Siswa',
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#createFormPerpindahankelas').on('submit', function() {
                $('#createModalPerpindahankelas').modal('hide');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#createFormIzinkeluar').on('submit', function() {
                $('#createModalIzinkeluar').modal('hide');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#createFormSuratTamu').on('submit', function() {
                $('#createFormSuratTamu').modal('hide');
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#createFormIzinkeluar').on('submit', function() {
                $('#createModalIzinkeluar').modal('hide');
            });

            // Membersihkan formulir setiap kali modal disembunyikan
            $('#createModalIzinkeluar').on('hidden.bs.modal', function() {
                $('#createFormIzinkeluar')[0].reset(); // Mengosongkan formulir
                $('#siswa_id').val(null).trigger('change'); // Mereset select dropdown nama siswa
            });

            // Inisialisasi plugin select2 untuk select dropdown nama siswa
            $('#siswa_id').select2({
                placeholder: 'Pilih Nama Siswa',
                allowClear: true
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi plugin select2 untuk select dropdown kelas
            $('#kelas_id').select2({
                placeholder: 'Cari Kelas...',
                allowClear: true,
                data: [] // Mengosongkan data opsi dropdown kelas
            });
        });
        $(document).ready(function() {
            $('#createFormPerpindahankelas').on('submit', function() {
                $('#createModalPerpindahankelas').modal('hide');
            });

            // Membersihkan formulir setiap kali modal disembunyikan
            $('#createModalPerpindahankelas').on('hidden.bs.modal', function() {
                $('#createFormPerpindahankelas')[0].reset(); // Mengosongkan formulir
                $('#kelas_id').val(null).trigger('change'); // Mereset select dropdown kelas

            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#createFormSuratTamu').on('submit', function() {
                $('#createModalSuratTamu').modal('hide');
            });

            // Membersihkan formulir setiap kali modal disembunyikan
            $('#createModalSuratTamu').on('hidden.bs.modal', function() {
                $('#createFormSuratTamu')[0].reset(); // Mengosongkan formulir
                $('#siswa_id').val(null).trigger('change'); // Mereset select dropdown nama siswa
            });

            // Inisialisasi plugin select2 untuk select dropdown nama siswa
            $('#siswa_id').select2({
                placeholder: 'Pilih Nama Siswa',
                allowClear: true
            });
        });
    </script>
    <script>
        // Tambahkan skrip animasi di sini
    </script>
</body>

</html>
