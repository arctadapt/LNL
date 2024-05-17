
@extends('layouts.navadmin')

@section('content')


<div class="container-xxl">
<!-- Form Import Siswa -->
<div class="card mt-4">
    <div class="card-body">
      <form action="{{ route('kelas.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="fileInput" class="form-label">Pilih file untuk diimpor:</label>
          <input type="file" name="file" class="form-control" id="fileInput">
        </div>
        <button type="submit" class="btn btn-success">Import Kelas</button>
      </form>
    </div>
  </div>

<!-- Striped Rows -->
<div class="card">
    <h5 class="card-header">

    </h5>
    <div class="table-responsive text-nowrap" >
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
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        {{-- <a class="dropdown-item" href="{{ route('siswa.edit', $data->id) }}">
                          <i class="bx bx-edit-alt me-1"></i> Edit
                        </a> --}}
                        <form action="{{ route('siswa.delete', $data->id) }}" method="POST" style="display:inline;">
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

