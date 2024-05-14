<x-app-layout>
    <div class="mt-5 space-y-3">
        <div class="">
            <form action="{{ route('siswa.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="bg-white">

                <button class="px-4 py-2 text-white bg-green-400 ms-3">Import Siswa</button>
            </form>
        </div>
        <div class="p-5 bg-white">
            <table class="w-full">
                <thead>
                    <tr class="text-2xl font-bold border-b border-black">
                        <td>NIS</td>
                        <td>Nama</td>
                        <td>Kelas</td>
                        <td>Jurusan</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
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
                                    <button class="text-red-500">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
