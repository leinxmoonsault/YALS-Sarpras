<?php

namespace App\Http\Controllers;

use App\Models\KebersihanSekolah;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageKebersihanSekolah extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mkebersihansekolah.index');
    }

    public function getReqSarpras(Request $request) {
        if ($request->ajax()) {
            $bulan = $request->input('bulan');
            $data = KebersihanSekolah::whereRaw("MONTH(tanggal_kebersihan) = MONTH(STR_TO_DATE('$bulan', '%M'))")->orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
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
     * @param  \App\Models\KebersihanSekolah  $kebersihanSekolah
     * @return \Illuminate\Http\Response
     */
    public function show(KebersihanSekolah $kebersihanSekolah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KebersihanSekolah  $kebersihanSekolah
     * @return \Illuminate\Http\Response
     */
    public function edit(KebersihanSekolah $kebersihanSekolah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KebersihanSekolah  $kebersihanSekolah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KebersihanSekolah $kebersihanSekolah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KebersihanSekolah  $kebersihanSekolah
     * @return \Illuminate\Http\Response
     */
    public function destroy(KebersihanSekolah $kebersihanSekolah)
    {
        //
    }
}
