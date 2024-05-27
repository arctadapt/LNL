@include('layouts.navigation')
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <form action="{{ route('terlambat.store') }}" method="POST" class="p-3 space-y-3 bg-white shadow-md w-15">
        @csrf
        <select name="siswa_id" id="siswa_id" class="w-full py-2">
            @foreach ($siswa as $data)
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
        </select>

        <textarea name="alasan" id="alasan" cols="30" rows="10" class="w-full p-3 border" placeholder='Alasan Telat Masuk...'></textarea>

        <button type="submit" class="px-5 py-2 font-bold text-white bg-blue-500 rounded-sm">Submit</button>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('#siswa_id').select2({
                placeholder: 'Cari Siswa...',
                allowClear: true
            });
        });
    </script>
</x-app-layout>
