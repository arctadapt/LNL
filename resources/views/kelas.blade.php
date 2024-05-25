@extends('layouts.navadmin')

@section('content')
    <div class="container-xxl">
        <!-- Form Import Siswa -->
        <div class="mt-4 p-3 bg-white shadow-md mb-3">
            <div class="">
                <form action="{{ route('kelas.import') }}" method="POST" enctype="multipart/form-data" class="flex">
                    @csrf
                    <div class="">
                        <label for="fileInput" class="form-label">Pilih file untuk diimpor:</label>
                        <input type="file" name="file" class="form-control py-1" id="fileInput">
                    </div>
                    <div class="flex flex-col justify-end">
                        <button type="submit" class="btn btn-success">Import Kelas</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Striped Rows -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>Kelas</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($kelas as $data)
                            <tr>
                                <td>{{ $data->kelas . ' ' . $data->jurusan }}</td>

                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            {{-- <a class="dropdown-item" href="{{ route('siswa.edit', $data->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a> --}}
                                            <form action="{{ route('siswa.delete', $data->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item">
                                                    <i class="bx bx-trash me-1"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Striped Rows -->


    </div>
@endsection
