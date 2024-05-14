<x-app-layout>
    <div class="space-y-3">
        <div class="mt-5">
            <form action="{{ route('kelas.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file" class="bg-white">
                <button class="px-4 py-2 text-white bg-green-400">Import Kelas</button>
            </form>
        </div>

        <div class="p-5 bg-white">
            <table class="w-full">
                <thead>
                    <tr class="text-2xl font-bold border-b border-black">
                        <td>Kelas</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kelas as $data)
                        <tr>
                            <td>{{ $data->kelas . ' ' . $data->jurusan }}</td>
                            <td>
                                <form action="{{ route('kelas.delete', $data->id) }}" method="POST">
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
