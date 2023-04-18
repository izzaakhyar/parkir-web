<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pmasuk2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_parkir = \App\Models\parkir2::all();
        $i = 1;
        return view('pmasuk2.index', compact('data_parkir', 'i'));
    }

    public function add(Request $request)
    {   
        $database = DB::table('parkir2');
        $platNomor = $request->platNomor;
        $ruangParkir = $request->ruangParkir;
        $sudah_masuk = $request->sudah_masuk;
        $parkir1Data = DB::table('parkir')->where('platNomor', $platNomor)->first();
        $parkir3Data = DB::table('parkir3')->where('platNomor', $platNomor)->first();

        $data = $database->where('platNomor', $platNomor)->first();

        // Jika kolom platNomor pada parkir1 mempunyai nilai sudah_masuk = 1, maka muncul pesan error
        if ($parkir1Data && $parkir1Data->sudah_masuk == 1) {
            return redirect()->route('pmasuk2')->with('error', 'Plat Nomor sudah ada di Mall 1');
        } else if ($parkir3Data && $parkir3Data->sudah_masuk == 1) {
            return redirect()->route('pmasuk2')->with('error', 'Plat Nomor sudah ada di Mall 3');
        } elseif ($data) {
            if ($data->sudah_masuk == 0) {
                // Update kolom 'sudah_masuk' menjadi 1 di tabel parkir2
                $pernah_masuk = $data->pernah_masuk + 1;
                $database->where('platNomor', $platNomor)->update([
                    'sudah_masuk' => 1,
                    'pernah_masuk' => $pernah_masuk,
                ]);

            // Insert ke tabel parkir1 atau parkir3
            if ($request->ruangParkir == 1) {
                DB::table('parkir')->insert([
                    'platNomor' => $request->platNomor,
                    'sudah_masuk' => $request->sudah_masuk,
                ]);
            } else if ($request->ruangParkir == 3) {
                DB::table('parkir3')->insert([
                    'platNomor' => $request->platNomor,
                    'sudah_masuk' => $request->sudah_masuk,
                ]);
            }

            return redirect()->route('pmasuk2')->with('success', 'Plat Nomor berhasil ditambahkan');
            } else {
                // Jika kolom 'sudah_masuk' di tabel parkir sudah sama dengan 1, maka tidak bisa ditambahkan
                return redirect()->route('pmasuk2')->with('error', 'Plat Nomor sudah ada di Mall 1');
            }
        } else {
            $database->insert([
                'platNomor' => $request->platNomor,
                'sudah_masuk' => $request->sudah_masuk,
                'pernah_masuk' => 1,
            ]);

            return redirect()->route('pmasuk2')->with('success', 'Plat Nomor berhasil ditambahkan');
        }
    }
}