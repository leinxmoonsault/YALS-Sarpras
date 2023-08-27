<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ManageKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mkelas.index');
    }

    public function getKelas(Request $request) {
        if ($request->ajax()) {
            $data = Kelas::orderBy('id', 'asc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'. route("Action.edit", $row->id) .'" class="edit btn btn-success btn-sm mb-2">Edit</a>';

                    $deleteForm = '<form class="delete" action="' . route("Action.destroy", $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus Data Kelas Ini ?\')">
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
        return view('mkelas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carikls = Kelas::orderBy('id', 'DESC')->value('id_kelas');
        $count = Kelas::orderBy('created_at', 'DESC')->count();
        $new_kelas = new Kelas();

        if ($count == 0) {
            # code...
            $idkls = "KLS-0001";
        }else {
            # code...
            $delete = preg_replace('/\D/', '', $carikls);
            $idkls = 'KLS-'.str_pad($delete+1,4,"0",STR_PAD_LEFT);
        }

        $new_kelas->id_kelas = $idkls;
        $new_kelas->nama_kelas = $request->get('nama_kelas');
        $new_kelas->lantai = $request->get('lantai');

        $new_kelas->created_at = now();
        $new_kelas->save();

        return redirect()->route('homekelas')->with('status','Kelas Berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('mkelas.edit', ['data' => $kelas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $new_kelas = Kelas::findOrFail($id);

        $new_kelas->nama_kelas = $request->get('nama_kelas');
        $new_kelas->lantai = $request->get('lantai');

        $new_kelas->updated_at = now();
        $new_kelas->save();

        return redirect()->route('homekelas')->with('status','Kelas Berhasil Ditambah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $berita = Kelas::findOrFail($id);

        $berita->delete();

        return response()->json(['message' => 'Data kelas berhasil dihapus']);
    }
}
