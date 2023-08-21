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

    public function getKelas(Request $request) {
        if ($request->ajax()) {
            $data = SarprasKelas::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'. route("Aksi.edit", $row->id) .'" class="edit btn btn-success btn-sm mb-2">Edit</a>';

                    $deleteForm = '<form class="delete" action="' . route("Aksi.destroy", $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus Data Kelas Ini ?\')">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                                    </form>';

                    return $editBtn . ' ' . $deleteForm;
                })
                ->rawColumns(['action'])
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
