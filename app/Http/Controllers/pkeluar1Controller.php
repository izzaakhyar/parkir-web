<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pkeluar1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir::all();
        $total_tarif = \App\Models\parkir::sum('tarif');
        $i = 1;
        return view('pkeluar1.index', compact('data_parkir', 'i', 'total_tarif'));
    }

    public function edit($id){
        $data_parkir = \App\Models\parkir::find($id);
        $total_tarif = \App\Models\parkir::sum('tarif');
        $data_ruang = \App\Models\ruang::all();
        return view('editKeluar.index', compact('data_parkir', 'total_tarif', 'data_ruang'));
    }

    public function update(Request $request,$id) {
        $data_parkir = \App\Models\parkir::find($id);
        $data_parkir->update($request->all());
        return redirect('/pkeluar1')->with('sukses','Data berhasil diupdate');
    }
}
