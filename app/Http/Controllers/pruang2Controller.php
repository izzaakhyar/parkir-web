<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pruang2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir2::all();
        return view('pruang2.index', ['data_parkir' => $data_parkir]);
    }

    public function edit($id){
        $data_parkir = \App\Models\parkir2::find($id);
        $data_ruang = \App\Models\ruang::all();
        $ruangan1 = array('D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10');
        $ruangan2 = array('E1', 'E2', 'E3', 'E4', 'E5', 'E6', 'E7', 'E8', 'E9', 'E10');
        $ruangan3 = array('F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10');
        return view('editRuang2.index', compact('data_parkir', 'data_ruang', 'ruangan1', 'ruangan2', 'ruangan3'));
    }

    public function update(Request $request,$id) {
        $data_parkir = \App\Models\parkir2::find($id);
        // $data_ruang = \App\Models\ruang::find($id);
        // $data_ruang->update($request->all());
        $data_parkir->update($request->all());
        return redirect('/pruang2')->with('sukses','Data berhasil diupdate');
    }
}