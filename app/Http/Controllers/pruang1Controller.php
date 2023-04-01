<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class pruang1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_ruang = \App\Models\ruang::all();
        return view('pruang1.index', ['data_ruang' => $data_ruang]);
    }

    public function edit($id)
    {
        $data_ruang = \App\Models\ruang::find($id);
        
        return view('editRuang.index', ['data_ruang' => $data_ruang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function show(ruang $ruang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ruang $ruang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ruang  $ruang
     * @return \Illuminate\Http\Response
     */
    public function destroy(ruang $ruang)
    {
        //
    }
}
