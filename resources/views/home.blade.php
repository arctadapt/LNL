<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Izin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha384-dT4h8a29xJzvmkMqbH7K5SrbJEYTw70gLF70Yg3dsV7CXFJbxCFPcK5Xs3Y6f8Dk" crossorigin="anonymous">
    <style>
          body {
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-primary,
        .btn-outline-primary {
            background-color: #6c5ce7;
            border-color: #6c5ce7;
        }

        .btn-primary:hover,
        .btn-outline-primary:hover {
            background-color: #4a3db4;
            border-color: #4a3db4;
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-body {
            padding: 20px;
        }

        .form-control {
            border-color: #6c5ce7;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #6c5ce7;
        }

        .btn-container {
            text-align: center;
        }

        .btn-custom {
            background-color: #6c5ce7;
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 15px 30px;
            font-size: 18px;
            margin-bottom: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #4a3db4;
            transform: scale(1.1);
        }
    </style>
</head>

<body>

  <div class="btn-container">
        <button class="btn btn-custom" data-toggle="modal" data-target="#createModalIzinkeluar">
            <i class="fas fa-user-plus mr-2"></i> Izin Keluar
        </button>
        <button class="btn btn-custom" data-toggle="modal" data-target="#createModalPerpindahankelas">
            <i class="fas fa-exchange-alt mr-2"></i> Perpindahan Kelas
        </button>
    </div>

    <!-- Create Modal Izin Perorang -->
    <div class="modal fade" id="createModalIzinkeluar" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Buat Izin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('keluar-kampus.storeIzinkeluar') }}" method="POST" id="createFormIzinkeluar">
                        @csrf

                        <div class="form-group">
                            <label for="siswa_id">Nama Siswa</label>
                            <select name="siswa_id[]" id="siswa_id" class="form-control" multiple required>
                                @foreach($siswas as $siswa)
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

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModalPerpindahankelas" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Form Perpindahan Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('keluar-kampus.storePindahkelas') }}" method="POST" id="createFormPerpindahankelas">
                        @csrf
                        <div class="form-group">
                            <label for="kelas_id">Kelas</label>
                            <select name="kelas_id" id="kelas_id" class="form-control" required>
                                @foreach($kelas as $kls)
                                <option value="{{ $kls->id }}">{{ $kls->kelas }} - {{ $kls->jurusan }}</option>
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

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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
        // Tambahkan skrip animasi di sini
    </script>



</body>

</html>
