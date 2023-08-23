<?php

namespace App\Http\Controllers;

use App\Models\SarprasKelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageSarprasKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('msarpraskelas.index');
    }

    public function getSarprasKelas(Request $request) {
        if ($request->ajax()) {
            $data = SarprasKelas::leftJoin('kelas','sarpras_kelas.id_kelas_sarpras','=','kelas.id_kelas')
            ->select('sarpras_kelas.*','kelas.nama_kelas','kelas.lantai')
            ->orderBy('id', 'asc')
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ruang', function($row){
                    return $row->nama_kelas . ' / ' . $row->lantai;
                })
                ->make(true);
        }
    }

    public function editDataSarprasKelas() {
        $data = \App\Models\SarprasKelas::all();
        
        return view('msarpraskelas.edit', ['data' => $data]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\Models\Kelas::all();
        return view('msarpraskelas.create', ['kelas' => $data]);
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
     * @param  \App\Models\SarprasKelas  $sarprasKelas
     * @return \Illuminate\Http\Response
     */
    public function show(SarprasKelas $sarprasKelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SarprasKelas  $sarprasKelas
     * @return \Illuminate\Http\Response
     */
    public function edit(SarprasKelas $sarprasKelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SarprasKelas  $sarprasKelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SarprasKelas $sarprasKelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SarprasKelas  $sarprasKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(SarprasKelas $sarprasKelas)
    {
        //
    }
}
