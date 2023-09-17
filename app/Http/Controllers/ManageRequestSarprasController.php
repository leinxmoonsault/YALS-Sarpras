<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\RequestSarpras;
use App\Models\Ruangan;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ManageRequestSarprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mrequestsarpras.index');
    }

    public function getReqSarpras(Request $request) {
        if ($request->ajax()) {
            $data = RequestSarpras::orderBy('id', 'asc')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function editReqSarpras() {
        $dataRuangan = Ruangan::selectRaw("CONCAT(nama_ruangan, ' / ', lantai) AS list_data_ruangan, id_ruangan AS id_data");
        $dataKelas = Kelas::selectRaw("CONCAT(nama_kelas, ' / ', lantai) AS list_data_ruangan, id_kelas AS id_data");
        $result = $dataRuangan->union($dataKelas)->get();
        
        return view('mrequestsarpras.edit', ['data' => $result]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataRuangan = Ruangan::selectRaw("CONCAT(nama_ruangan, ' / ', lantai) AS list_data_ruangan, id_ruangan AS id_data");
        $dataKelas = Kelas::selectRaw("CONCAT(nama_kelas, ' / ', lantai) AS list_data_ruangan, id_kelas AS id_data");
        $result = $dataRuangan->union($dataKelas)->get();

        return view('mrequestsarpras.create', ['data' => $result]);
    }

    public function getExistedReqData($id)
    {
        $data   =   \App\Models\RequestSarpras::where('untuk_ruang', $id)->get();
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
            'harga_barang'    =>   $request->input('harga_barang'),
            'keterangan_barang' =>   $request->input('ket_barang')
        ];
        $ruang  = $request->input('ruang');
        $tgl    = date('Y-m-d', strtotime(now()));
        // End Prep Data Array
        
        foreach ($data_array['nama_barang'] as $key => $nama) {
            # code...

            // Prep Data
            $user   = Auth::user()->nama;
            // End Prep Data
            // Get Array Data
            $jumlah     = $data_array['jumlah_barang'][$key];
            $harga      = $data_array['harga_barang'][$key];
            $ket        = $data_array['keterangan_barang'][$key];
            // End Get Array Data

            // Bikin Kode Unique
            $carikdreq = RequestSarpras::orderBy('id', 'DESC')->value('id_req');
            $count = RequestSarpras::orderBy('created_at', 'DESC')->count();

            if ($count == 0) {
                # code...
                $idreq = "REQSRPS-00001";
            }else {
                # code...
                $delete = preg_replace('/\D/', '', $carikdreq);
                $idreq = 'REQSRPS-'.str_pad($delete+1,5,"0",STR_PAD_LEFT);
            }
            // End Bikin Kode Unique

            // Insert Ke Database
            $create = RequestSarpras::create([
                'id_req'        =>  $idreq,
                'untuk_ruang'   =>  $ruang,
                'nama_barang'   =>  $nama,
                'jumlah_barang' =>  $jumlah,
                'harga_barang'  =>  $harga,
                'status'        => 'Belum Diapprove Kepala Sekolah dan Yayasan',
                'keterangan'    =>  $ket,
                'tanggal_req'   =>  $tgl,
                'req_by'        =>  $user,
                'created_at'    =>  now()
            ]);
        }

        return redirect()->route('homereqsarpras')->with('status','Siswa Berhasil Ditambah'); 
        
    }

    public function print_laporan_request_sarpras()
    {
        $predata        = RequestSarpras::orderBy('id', 'asc')->get();

        
        $pdf = PDF::loadView('mrequestsarpras.laporan', ['data' => $predata, 'i' => 0]);
        return $pdf->stream("", array("Attachment" => false));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RequestSarpras  $requestSarpras
     * @return \Illuminate\Http\Response
     */
    public function show(RequestSarpras $requestSarpras)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RequestSarpras  $requestSarpras
     * @return \Illuminate\Http\Response
     */
    public function edit(RequestSarpras $requestSarpras)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RequestSarpras  $requestSarpras
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = RequestSarpras::findOrFail($id);

        // Mengisi kolom updated_by dengan nama pengguna yang sedang login
        $item->req_by = Auth::user()->nama;

        $item->update($request->all());

        return response()->json(['message' => 'Data updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RequestSarpras  $requestSarpras
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = RequestSarpras::findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
