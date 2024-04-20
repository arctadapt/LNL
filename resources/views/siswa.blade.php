<!DOCTYPE html>
<html>
<head>
    <title>Laravel 10 Import Export Excel to Database Example - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
          Import data kelas
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" class="form-control mb-2">
                        <button class="btn btn-success">Import Siswa</button>
                    </form>
                </div>
                <div class="col-md-6">
                    <a href="{{route('kelas.index')}}" class="btn btn-warning">Import Kelas</a>
                </div>
            </div>
            <table class="table table-bordered mt-3">
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                </tr>
                @foreach($siswa as $data)
                <tr>
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->kelas }}</td>
                    <td>{{ $data->jurusan }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

</body>
</html>
