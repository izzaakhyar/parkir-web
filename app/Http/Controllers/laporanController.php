<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir::all();
        $data_parkir2 = \App\Models\parkir2::all();
        $data_parkir3 = \App\Models\parkir3::all();

        $merged_data = collect($data_parkir)->merge($data_parkir2)->merge($data_parkir3);

        $grouped_data = $merged_data->groupBy('platNomor')->map(function ($group) {
            $parkir = $group->first();
            $parkir->pernah_masuk = $group->sum('pernah_masuk');
            $parkir->tarif = $group->sum('tarif');
            return $parkir;
        });

        $total_keseluruhan = $grouped_data->sum('tarif');
        $i = 1;

        return view('laporanKeuangan.index', compact('grouped_data', 'total_keseluruhan', 'i'));
    }

    public function laporan1()
    {
        $data_parkir = \App\Models\parkir::all();
        $total_tarif = \App\Models\parkir::sum('tarif');
        $i = 1;
        return view('laporanKeuangan.laporan1', ['data_parkir' => $data_parkir, 'total_tarif' => $total_tarif, 'i' => $i]);
    }

    public function laporan2()
    {
        $data_parkir = \App\Models\parkir2::all();
        $total_tarif = \App\Models\parkir2::sum('tarif');
        $i = 1;
        return view('laporanKeuangan.laporan2', ['data_parkir' => $data_parkir, 'total_tarif' => $total_tarif, 'i' => $i]);
    }

    public function laporan3()
    {
        $data_parkir = \App\Models\parkir3::all();
        $total_tarif = \App\Models\parkir3::sum('tarif');
        $i = 1;
        return view('laporanKeuangan.laporan3', ['data_parkir' => $data_parkir, 'total_tarif' => $total_tarif, 'i' => $i]);
    }
}
