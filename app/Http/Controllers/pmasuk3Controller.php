<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pmasuk3Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir3::all();
        return view('pmasuk3.index', ['data_parkir' => $data_parkir]);
    }

    public function add(Request $request)
    {   
        $database = DB::table('parkir3');
        $platNomor = $request->platNomor;
        $ruangParkir = $request->ruangParkir;
        $sudah_masuk = $request->sudah_masuk;
        $parkir2Data = DB::table('parkir2')->where('platNomor', $platNomor)->first();
        $parkirData = DB::table('parkir')->where('platNomor', $platNomor)->first();

        $data = $database->where('platNomor', $platNomor)->first();

        if ($parkir2Data) {
            return redirect()->route('pmasuk3')->with('error', 'Plat Nomor sudah ada di Mall 2');
        } else if ($parkirData) {
            return redirect()->route('pmasuk3')->with('error', 'Plat Nomor sudah ada di Mall 1');
        } elseif ($data) {
            $pernah_masuk = $data->pernah_masuk + 1;
            $database->where('platNomor', $platNomor)->update([
                'ruangParkir' => $ruangParkir,
                'sudah_masuk' => $sudah_masuk == 1,
                'pernah_masuk' => $pernah_masuk,
            ]);

            return redirect()->route('pmasuk3')->with('success', 'Plat Nomor berhasil ditambahkan');
        } else {
            $database->insert([
                'platNomor' => $request->platNomor,
                'sudah_masuk' => $request->sudah_masuk,
                'pernah_masuk' => 1,
            ]);

            return redirect()->route('pmasuk3')->with('success', 'Plat Nomor berhasil ditambahkan');
        }
    }
}