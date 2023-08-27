<?php

namespace App\Http\Controllers;

use App\Models\SarprasKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $data = \App\Models\Kelas::all();
        
        return view('msarpraskelas.edit', ['kelas' => $data]);
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

    public function getExistedData($id)
    {
        $data   =   \App\Models\SarprasKelas::where('id_kelas_sarpras', $id)->get();
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
        $kelas = $request->input('lantai');
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
            $carikdbrg = SarprasKelas::orderBy('id', 'DESC')->value('id_barang_sarpras');
            $count = SarprasKelas::orderBy('created_at', 'DESC')->count();

            if ($count == 0) {
                # code...
                $idbrt = "SRPSKLS-00001";
            }else {
                # code...
                $delete = preg_replace('/\D/', '', $carikdbrg);
                $idbrt = 'SRPSKLS-'.str_pad($delete+1,5,"0",STR_PAD_LEFT);
            }
            // End Bikin Kode Unique
            
            // Insert Ke Database
            $create = SarprasKelas::create([
                'id_kelas_sarpras'  =>  $kelas,
                'id_barang_sarpras' =>  $idbrt,
                'nama_barang'       =>  $nama,
                'jumlah_barang'     =>  $jumlah,
                'kondisi'           =>  $kondisi,
                'keterangan'        =>  $ket,
                'update_by'         =>  $user,
                'created_at'        =>  now()
            ]);
        }

        return redirect()->route('homesarpraskelas')->with('status','Siswa Berhasil Ditambah'); 
        
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
    public function update(Request $request, $id)
    {
        $item = SarprasKelas::findOrFail($id);

        // Mengisi kolom updated_by dengan nama pengguna yang sedang login
        $item->update_by = Auth::user()->nama;

        $item->update($request->all());

        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SarprasKelas  $sarprasKelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = SarprasKelas::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
