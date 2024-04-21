<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\KelasImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Kelas;
class KelasController extends Controller
{
      /**
    * @return \Illuminate\Support\Collection
    */
    public function index()
    {
        $kelas = Kelas::get();

        return view('kelas', compact('kelas'));
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function delete($id) {
        Kelas::find($id)->delete();

        return redirect()->back();
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new KelasImport,request()->file('file'));

        return back();
    }
}
