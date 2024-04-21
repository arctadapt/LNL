<x-app-layout>
    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import data kelas
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('kelas.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="form-control mb-2">
                            <button class="btn btn-success">Import Kelas</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('siswa.index') }}" class="btn btn-warning">Import Siswa</a>
                    </div>
                </div>

                <table class="table table-bordered mt-3">
                    <tr>
                        <th>Kelas</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($kelas as $data)
                        <tr>
                            <td>{{ $data->kelas . ' ' . $data->jurusan }}</td>
                            <td>
                                <form action="{{ route('kelas.delete', $data->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
