<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\parkir;
use App\Models\parkir2;
use App\Models\parkir3;


class pmasuk1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir::all();
        return view('pmasuk1.index', ['data_parkir' => $data_parkir]);
    }

    public function add(Request $request)
    {   
        // $database = DB::table('parkir');
        // $platNomor = $request->platNomor;
        // $ruangParkir = $request->ruangParkir;
        // $sudah_masuk = $request->sudah_masuk;
        // $parkir2Data = DB::table('parkir2')->where('platNomor', $platNomor)->first();
        // $parkir3Data = DB::table('parkir3')->where('platNomor', $platNomor)->first();

        // $data = $database->where('platNomor', $platNomor)->first();

        // if ($parkir2Data) {
        //     return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Mall 2');
        // } else if ($parkir3Data) {
        //     return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Mall 3');
        // } elseif ($data) {
        //     $pernah_masuk = $data->pernah_masuk + 1;
        //     $database->where('platNomor', $platNomor)->update([
        //         'ruangParkir' => $ruangParkir,
        //         'sudah_masuk' => $sudah_masuk == 1,
        //         'pernah_masuk' => $pernah_masuk,
        //     ]);

        //     return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan');
        // } else {
        //     $database->insert([
        //         'platNomor' => $request->platNomor,
        //         'sudah_masuk' => $request->sudah_masuk,
        //         'pernah_masuk' => 1,
        //     ]);

        //     return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan');
        // }

        

    $platNomor = $request->platNomor;
    $ruangParkir = $request->ruangParkir;
    $sudah_masuk = $request->sudah_masuk;

    $parkir = parkir::where('platNomor', $platNomor)->first();
    $parkir2 = parkir2::where('platNomor', $platNomor)->first();
    $parkir3 = parkir3::where('platNomor', $platNomor)->first();

    if ($parkir && $parkir->sudah_masuk == 1) {
        return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Parkir 1');
    } elseif ($parkir2 && $parkir2->sudah_masuk == 1) {
        return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Parkir 2');
    } elseif ($parkir3 && $parkir3->sudah_masuk == 1) {
        return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Parkir 3');
    } elseif ($parkir && $parkir->sudah_masuk == 0) {
        $parkir->update([
            'ruangParkir' => $ruangParkir,
            'sudah_masuk' => $sudah_masuk,
            'pernah_masuk' => $parkir->pernah_masuk + 1,
        ]);
        return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan ke Parkir 1');
    } elseif (!$parkir) {
        parkir::create([
            'platNomor' => $platNomor,
            'sudah_masuk' => $sudah_masuk,
            'pernah_masuk' => 1,
        ]);
        return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan ke Parkir 1');
    } elseif (!$parkir2) {
        parkir2::create([
            'platNomor' => $platNomor,
            'sudah_masuk' => $sudah_masuk,
            'pernah_masuk' => 1,
        ]);
        return redirect()->route('pmasuk2')->with('success', 'Plat Nomor berhasil ditambahkan ke Parkir 2');
    } elseif (!$parkir3) {
        parkir3::create([
            'platNomor' => $platNomor,
            'sudah_masuk' => $sudah_masuk,
            'pernah_masuk' => 1,
        ]);
        return redirect()->route('pmasuk3')->with('success', 'Plat Nomor berhasil ditambahkan ke Parkir 3');
    }
}
}