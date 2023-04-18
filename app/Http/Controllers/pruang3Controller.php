<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pruang3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir3::all();
        $i = 1;
        return view('pruang3.index', compact('data_parkir', 'i'));
    }

    public function edit($id){
        $data_parkir = \App\Models\parkir3::find($id);
        $data_ruang = \App\Models\ruang::all();
        $ruangan1 = array('G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7', 'G8', 'G9', 'G10');
        $ruangan2 = array('H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10');
        $ruangan3 = array('I1', 'I2', 'I3', 'I4', 'I5', 'I6', 'I7', 'I8', 'I9', 'I10');
        return view('editRuang3.index', compact('data_parkir', 'data_ruang', 'ruangan1', 'ruangan2', 'ruangan3'));
    }

    public function update(Request $request,$id) {
        $data_parkir = \App\Models\parkir3::find($id);
        // $data_ruang = \App\Models\ruang::find($id);
        // $data_ruang->update($request->all());
        $data_parkir->update($request->all());
        return redirect('/pruang3')->with('sukses','Data berhasil diupdate');
    }
}