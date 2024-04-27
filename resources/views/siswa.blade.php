<x-app-layout>
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center justify-content-evenly" id="default-styled-tab"
            data-tabs-toggle="#default-styled-tab-content"
            data-tabs-active-classes="text-purple-600 hover:text-purple-600 dark:text-purple-500 dark:hover:text-purple-500 border-purple-600 dark:border-purple-500"
            data-tabs-inactive-classes="dark:border-transparent text-gray-500 hover:text-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300"
            role="tablist">
            <li class="me-2" role="presentation">
                <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-styled-tab"
                    data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">Siswa</button>
            </li>
            <li class="me-2" role="presentation">
                <button
                    class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                    id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab"
                    aria-controls="dashboard" aria-selected="false">Kelas</button>
            </li>
        </ul>
    </div>
    <div id="default-styled-tab-content">
        <div class="hidden p-4 bg-white rounded-lg shadow-md" id="styled-profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="container">
                <div class="mt-3 card">
                    <div class="card-header">
                        Import data Siswa
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">

                                <button class="btn btn-success">Import Siswa</button>
                            </form>
                            {{-- <div class="col-md-6">
                                <a href="{{ route('kelas.index') }}" class="btn btn-warning">Import Kelas</a>
                            </div> --}}
                        </div>
                        <table class="table mt-3 table-bordered">
                            <tr>
                                <th>NIS</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($siswa as $data)
                                <tr>
                                    <td>{{ $data->nis }}</td>
                                    <td>{{ $data->nama }}</td>
                                    <td>{{ $data->kelas }}</td>
                                    <td>{{ $data->jurusan }}</td>
                                    <td>
                                        <form action="{{ route('siswa.delete', $data->id) }}" method="POST">
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
        </div>
        <div class="hidden p-4 bg-white rounded-lg shadow-md" id="styled-dashboard" role="tabpanel"
            aria-labelledby="dashboard-tab">
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
                            {{-- <div class="col-md-6">
                                <a href="{{ route('siswa.index') }}" class="btn btn-warning">Import Siswa</a>
                            </div> --}}
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
        </div>
    </div>
</x-app-layout>
