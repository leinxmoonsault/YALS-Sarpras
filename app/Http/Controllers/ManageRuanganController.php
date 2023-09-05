<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ManageRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mruangan.index');
    }

    public function getRuangan(Request $request) {
        if ($request->ajax()) {
            $data = Ruangan::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'. route("Go.edit", $row->id) .'" class="edit btn btn-success btn-sm mb-2">Edit</a>';

                    $deleteForm = '<form class="delete" action="' . route("Go.destroy", $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus Data Kelas Ini ?\')">
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
        return view('mruangan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carirng = Ruangan::orderBy('id', 'DESC')->value('id_ruangan');
        $count = Ruangan::orderBy('created_at', 'DESC')->count();
        $new_ruangan = new Ruangan();

        if ($count == 0) {
            # code...
            $idrng = "RNA-0001";
        }else {
            # code...
            $delete = preg_replace('/\D/', '', $carirng);
            $idrng = 'RNA-'.str_pad($delete+1,4,"0",STR_PAD_LEFT);
        }

        $new_ruangan->id_ruangan = $idrng;
        $new_ruangan->nama_ruangan = $request->get('nama_ruangan');
        $new_ruangan->lantai = $request->get('lantai');

        $new_ruangan->created_at = now();
        $new_ruangan->save();

        return redirect()->route('homeruangan')->with('status','Ruangan Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function show(Ruangan $ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('mruangan.edit', ['data' => $ruangan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new_ruang = Ruangan::findOrFail($id);

        $new_ruang->nama_ruangan = $request->get('nama_ruangan');
        $new_ruang->lantai = $request->get('lantai');

        $new_ruang->updated_at = now();
        $new_ruang->save();

        return redirect()->route('homeruangan')->with('status','Ruangan Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ruangan  $ruangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Ruangan::findOrFail($id);

        $berita->delete();

        return response()->json(['message' => 'Data Ruangan berhasil dihapus']);
    }
}
