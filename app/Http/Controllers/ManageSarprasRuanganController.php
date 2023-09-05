<?php

namespace App\Http\Controllers;

use App\Models\SarprasRuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ManageSarprasRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('msarprasruangan.index');
    }

    public function getSarprasRuangan(Request $request) {
        if ($request->ajax()) {
            $data = SarprasRuangan::leftJoin('ruangan','sarpras_ruangan.id_ruangan_sarpras','=','ruangan.id_ruangan')
            ->select('sarpras_ruangan.*','ruangan.nama_ruangan','ruangan.lantai')
            ->orderBy('id', 'asc')
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('ruang', function($row){
                    return $row->nama_ruangan . ' / ' . $row->lantai;
                })
                ->make(true);
        }
    }

    public function editDataSarprasRuangan() {
        $data = \App\Models\Ruangan::all();
        
        return view('msarprasruangan.edit', ['ruangan' => $data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = \App\Models\Ruangan::all();
        return view('msarprasruangan.create', ['ruangan' => $data]);
    }

    public function getExistedRuanganData($id)
    {
        $data   =   \App\Models\SarprasRuangan::where('id_ruangan_sarpras', $id)->get();
        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Prep Data Array
        $data_array   = [
            'nama_barang'       =>   $request->input('nama_barang'),
            'jumlah_barang'     =>   $request->input('jumlah_barang'),
            'kondisi_barang'    =>   $request->input('kondisi_barang'),
            'keterangan_barang' =>   $request->input('ket_barang')
        ];
        $ruangan = $request->input('lantai');
        // End Prep Data Array
        
        foreach ($data_array['nama_barang'] as $key => $nama) {
            # code...

            // Prep Data
            $user   = Auth::user()->nama;
            // End Prep Data
            // Get Array Data
            $jumlah     = $data_array['jumlah_barang'][$key];
            $kondisi    = $data_array['kondisi_barang'][$key];
            $ket        = $data_array['keterangan_barang'][$key];
            // End Get Array Data

            // Bikin Kode Unique
            $carikdbrg = SarprasRuangan::orderBy('id', 'DESC')->value('id_barang_sarpras_ruangan');
            $count = SarprasRuangan::orderBy('created_at', 'DESC')->count();

            if ($count == 0) {
                # code...
                $idbrt = "SRPSRNA-00001";
            }else {
                # code...
                $delete = preg_replace('/\D/', '', $carikdbrg);
                $idbrt = 'SRPSRNA-'.str_pad($delete+1,5,"0",STR_PAD_LEFT);
            }
            // End Bikin Kode Unique
            // dd($idbrt);
            // Insert Ke Database
            $create = SarprasRuangan::create([
                'id_ruangan_sarpras'        =>  $ruangan,
                'id_barang_sarpras_ruangan' =>  $idbrt,
                'nama_barang'               =>  $nama,
                'jumlah_barang'             =>  $jumlah,
                'kondisi'                   =>  $kondisi,
                'keterangan'                =>  $ket,
                'update_by'                 =>  $user,
                'created_at'                =>  now()
            ]);
        }

        return redirect()->route('homesarprasruangan')->with('status','Siswa Berhasil Ditambah'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SarprasRuangan  $sarprasRuangan
     * @return \Illuminate\Http\Response
     */
    public function show(SarprasRuangan $sarprasRuangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SarprasRuangan  $sarprasRuangan
     * @return \Illuminate\Http\Response
     */
    public function edit(SarprasRuangan $sarprasRuangan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SarprasRuangan  $sarprasRuangan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = SarprasRuangan::findOrFail($id);

        // Mengisi kolom updated_by dengan nama pengguna yang sedang login
        $item->update_by = Auth::user()->nama;

        $item->update($request->all());

        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SarprasRuangan  $sarprasRuangan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SarprasRuangan::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
