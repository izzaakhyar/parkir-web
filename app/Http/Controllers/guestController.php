<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function parkir1()
    {
        $data_ruang = \App\Models\parkir::all();
        $ruangan1 = array('A1', 'A2', 'A3', 'A4', 'A5', 'A6', 'A7', 'A8', 'A9', 'A10');
        $ruangan2 = array('B1', 'B2', 'B3', 'B4', 'B5', 'B6', 'B7', 'B8', 'B9', 'B10');
        $ruangan3 = array('C1', 'C2', 'C3', 'C4', 'C5', 'C6', 'C7', 'C8', 'C9', 'C10');
        return view('parkirMall.parkir1', compact('data_ruang', 'ruangan1', 'ruangan2', 'ruangan3'));
    }

    public function parkir2()
    {
        $data_ruang = \App\Models\parkir2::all();
        $ruangan1 = array('D1', 'D2', 'D3', 'D4', 'D5', 'D6', 'D7', 'D8', 'D9', 'D10');
        $ruangan2 = array('E1', 'E2', 'E3', 'E4', 'E5', 'E6', 'E7', 'E8', 'E9', 'E10');
        $ruangan3 = array('F1', 'F2', 'F3', 'F4', 'F5', 'F6', 'F7', 'F8', 'F9', 'F10');
        return view('parkirMall.parkir2', compact('data_ruang', 'ruangan1', 'ruangan2', 'ruangan3'));
    }

    public function parkir3()
    {
        $data_ruang = \App\Models\parkir3::all();
        $ruangan1 = array('G1', 'G2', 'G3', 'G4', 'G5', 'G6', 'G7', 'G8', 'G9', 'G10');
        $ruangan2 = array('H1', 'H2', 'H3', 'H4', 'H5', 'H6', 'H7', 'H8', 'H9', 'H10');
        $ruangan3 = array('I1', 'I2', 'I3', 'I4', 'I5', 'I6', 'I7', 'I8', 'I9', 'I10');
        return view('parkirMall.parkir3', compact('data_ruang', 'ruangan1', 'ruangan2', 'ruangan3'));
    }
}
