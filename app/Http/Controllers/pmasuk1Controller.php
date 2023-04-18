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
        $i = 1;
        return view('pmasuk1.index', compact('data_parkir', 'i'));
    }

    public function add(Request $request)
    {   
        $database = DB::table('parkir');
        $platNomor = $request->platNomor;
        $ruangParkir = $request->ruangParkir;
        $sudah_masuk = $request->sudah_masuk;
        $parkir2Data = DB::table('parkir2')->where('platNomor', $platNomor)->first();
        $parkir3Data = DB::table('parkir3')->where('platNomor', $platNomor)->first();

        $data = $database->where('platNomor', $platNomor)->first();

        // Jika kolom platNomor pada parkir2 mempunyai nilai sudah_masuk = 1, maka muncul pesan error
        if ($parkir2Data && $parkir2Data->sudah_masuk == 1) {
            return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Mall 2');
        } else if ($parkir3Data && $parkir3Data->sudah_masuk == 1) {
            return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Mall 3');
        } elseif ($data) {
            if ($data->sudah_masuk == 0) {
                // Update kolom 'sudah_masuk' menjadi 1 di tabel parkir
                $pernah_masuk = $data->pernah_masuk + 1;
                $database->where('platNomor', $platNomor)->update([
                    'sudah_masuk' => 1,
                    'pernah_masuk' => $pernah_masuk,
                ]);

            // Insert ke tabel parkir2 atau parkir3
            if ($request->ruangParkir == 2) {
                DB::table('parkir2')->insert([
                    'platNomor' => $request->platNomor,
                    'sudah_masuk' => $request->sudah_masuk,
                ]);
            } else if ($request->ruangParkir == 3) {
                DB::table('parkir3')->insert([
                    'platNomor' => $request->platNomor,
                    'sudah_masuk' => $request->sudah_masuk,
                ]);
            }

            return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan');
            } else {
                // Jika kolom 'sudah_masuk' di tabel parkir sudah sama dengan 1, maka tidak bisa ditambahkan
                return redirect()->route('pmasuk1')->with('error', 'Plat Nomor sudah ada di Mall 1');
            }
        } else {
            $database->insert([
                'platNomor' => $request->platNomor,
                'sudah_masuk' => $request->sudah_masuk,
                'pernah_masuk' => 1,
            ]);

            return redirect()->route('pmasuk1')->with('success', 'Plat Nomor berhasil ditambahkan');
        }
    }
}