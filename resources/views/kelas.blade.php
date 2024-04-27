<x-app-layout>
    <div class="container">
        <div class="mt-3 card bg-light">
            <div class="card-header">
                Import data kelas
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6">
                        <form action="{{ route('kelas.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="file" name="file" class="mb-2 form-control">
                            <button class="btn btn-success">Import Kelas</button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('siswa.index') }}" class="btn btn-warning">Import Siswa</a>
                    </div>
                </div>

                <table class="table mt-3 table-bordered">
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
