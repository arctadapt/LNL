<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SiswaImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Siswa;
class SiswaController extends Controller
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $siswa = Siswa::get();

        return view('siswa', compact('siswa'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new SiswaImport,request()->file('file'));

        return back();
    }
}
