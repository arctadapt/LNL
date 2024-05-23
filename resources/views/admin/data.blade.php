@extends('layouts.navadmin')

@section('content')
    <div class="flex gap-3 mx-4 ">
        <a href="{{ route('data.terlambat') }}"
            class="col flex text-black  bg-white p-3 link-underline link-underline-opacity-0">
            <div class="w-1/4 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="7em" height="7em" viewBox="0 0 256 256">
                    <path fill="currentColor"
                        d="m226.53 56.41l-96-32a8 8 0 0 0-5.06 0l-96 32A8 8 0 0 0 24 64v80a8 8 0 0 0 16 0V75.1l33.59 11.19a64 64 0 0 0 20.65 88.05c-18 7.06-33.56 19.83-44.94 37.29a8 8 0 1 0 13.4 8.74C77.77 197.25 101.57 184 128 184s50.23 13.25 65.3 36.37a8 8 0 0 0 13.4-8.74c-11.38-17.46-27-30.23-44.94-37.29a64 64 0 0 0 20.65-88l44.12-14.7a8 8 0 0 0 0-15.18ZM176 120a48 48 0 1 1-86.65-28.45l36.12 12a8 8 0 0 0 5.06 0l36.12-12A47.9 47.9 0 0 1 176 120m-48-32.43L57.3 64L128 40.43L198.7 64Z" />
                </svg>
            </div>

            <div class="w-3/4">
                <p>Jumlah Siswa Yang Terlambat Hari Ini : <b>{{ $latesToday }}</b></p>
                <p>Jumlah Siswa Yang Terlambat Minggu Ini : <b>{{ $latesWeek }}</b></p>
                <p>Jumlah Siswa Yang Terlambat Bulan Ini : <b>{{ $latesMonth }}</b></p>
            </div>
        </a>

        <a href="{{ route('data.guest') }}"
            class="col text-black bg-white flex p-3 link-underline link-underline-opacity-0">
            <div class="w-1/4">
                <svg xmlns="http://www.w3.org/2000/svg" width="7em" height="7em" viewBox="0 0 16 16">
                    <path fill="currentColor"
                        d="M6 7a2 2 0 1 1 4 0a2 2 0 0 1-4 0m2-1a1 1 0 1 0 0 2a1 1 0 0 0 0-2m-2.305 4c-.331 0-.69.238-.72.657c-.023.315.005.922.46 1.453c.461.54 1.269.89 2.565.89s2.104-.35 2.566-.89c.454-.531.482-1.138.46-1.453c-.03-.42-.39-.657-.721-.657zm.499 1.46a.93.93 0 0 1-.21-.46h4.032a.93.93 0 0 1-.21.46c-.204.237-.678.54-1.806.54s-1.602-.303-1.806-.54M10.914 2h.586A1.5 1.5 0 0 1 13 3.5v10a1.5 1.5 0 0 1-1.5 1.5h-7A1.5 1.5 0 0 1 3 13.5v-10A1.5 1.5 0 0 1 4.5 2h.585A1.5 1.5 0 0 1 6.5 1h3a1.5 1.5 0 0 1 1.415 1M5.086 3H4.5a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-10a.5.5 0 0 0-.5-.5h-.585A1.5 1.5 0 0 1 9.5 4h-3a1.5 1.5 0 0 1-1.415-1M6 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5" />
                </svg>
            </div>
            <div class="w-3/4">
                <p>Jumlah Tamu Hari Ini : <b>{{ $guestsMonth }}</b></p>
                <p>Jumlah Tamu Minggu Ini : <b>{{ $guestsWeek }}</b></p>
                <p>Jumlah Tamu Bulan Ini : <b>{{ $guestsToday }}</b></p>
            </div>
        </a>
    </div>
@endsection
