<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Ruangan;
use App\Models\SarprasRuangan;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class LaporanSarprasRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mlaporanruangan.index');
    }

    public function getLaporanSarprasRuangan(Request $request) {
        if ($request->ajax()) {
            $param  = '/SPS/RNA';
            $data = Laporan::where('id_laporan','like','%'.$param.'%')
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'. route("Toss.show", $row->id) .'" class="edit btn btn-primary btn-sm mb-2" target="_blank">Show</a>';

                    $deleteForm = '<form class="delete" action="' . route("Toss.destroy", $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus Data Kelas Ini ?\')">
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
        $data = \App\Models\Ruangan::all();

        return view('mlaporanruangan.create', ['ruangan' => $data]);
    }

    public function getExistedLaporanRuanganData($id)
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
        // Bikin Kode Unique
        $new_laporan = new \App\Models\Laporan();
        $param  = '/SPS/RNA';
        $carilap = Laporan::where('id_laporan','like','%'.$param.'%')->orderBy('id', 'DESC')->value('id_laporan');
        $count = Laporan::where('id_laporan','like','%'.$param.'%')->orderBy('created_at', 'DESC')->count();
        
        if ($count == 0) {
            # code...
            $idlap = "SMA-YAPPENDA/LAP/SPS/RNA/001";
        }else {
            # code...
            $delete = preg_replace('/\D/', '', $carilap);
            $idlap = 'SMA-YAPPENDA/LAP/SPS/RNA/'.str_pad($delete+1,3,"0",STR_PAD_LEFT);
        }
        // End Bikin Kode Unique
        

        // Prep Data
        $user   = Auth::user()->nama;
        // End Prep Data
        // Cari Data Kelas
        $cariruangan  = Ruangan::where('id_ruangan','=', $request->get('ruangan'))->first();
        // End Cari Data Kelas
        
        // Format Data
        $newdate        = date('Y-m-d', strtotime($request->get('tanggal')));
        $nama_laporan   = 'Laporan-Sarpras-'.$cariruangan->nama_kelas.'-'.$newdate.'.pdf';
        $savePDF        = public_path('Laporan/Sarpras-Ruangan/').$nama_laporan;
        // End Format Data

        // Insert Ke Database
        $new_laporan->id_laporan        = $idlap;
        $new_laporan->id_pass_laporan  = $request->get('ruangan');
        $new_laporan->nama_laporan      = $nama_laporan;
        $new_laporan->tanggal_laporan   = $newdate;
        $new_laporan->file_laporan      = $savePDF;
        $new_laporan->update_by         = $user;

        $new_laporan->save();
        // End Insert Ke Database
        // Search Data Untuk Generate PDF
        $predata        = SarprasRuangan::where('id_ruangan_sarpras','=',$cariruangan->id_ruangan)->get()->all();
        $data_ruangan   = Ruangan::where('id_ruangan','=',$cariruangan->id_ruangan)->first();
        $generatePDF    = PDF::loadView('mlaporanruangan.laporan', ['data' => $predata, 'data_ruangan'  => $data_ruangan ,'i' => 0]);
        // End Search Data Untuk Generate PDF

        // Save PDF
        $generatePDF->save($savePDF);
        // End Save PDF

        return redirect()->route('print_laporan_sarpras_ruangan', ['id' => $cariruangan->id_ruangan]);
    }

    public function print_laporan_sarpras_ruangan($id)
    {
        $predata        = SarprasRuangan::where('id_ruangan_sarpras','=',$id)->get();
        $data_ruangan   = Ruangan::where('id_ruangan','=',$id)->first();
        
        $pdf = PDF::loadView('mlaporanruangan.laporan', ['data' => $predata, 'data_ruangan'  => $data_ruangan ,'i' => 0]);
        return $pdf->stream("", array("Attachment" => false));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Laporan::findOrFail($id);
        $predata    = SarprasRuangan::where('id_ruangan_sarpras','=',$item->id_pass_laporan)->get();
        $pdf = PDF::loadView('mlaporanruangan.laporan', ['data' => $predata,'i' => 0]);
        return $pdf->stream("", array("Attachment" => false));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Laporan::findOrFail($id);
        $get_nama_laporan = $item->nama_laporan;

        if ($get_nama_laporan && file_exists(public_path('Laporan/Sarpras-Kelas/'.$get_nama_laporan))) {
            File::delete(public_path('Laporan/Sarpras-Kelas/'.$get_nama_laporan));
        }

        $item->delete();

        return response()->json(['message' => 'Data deleted successfully']);
    }
}
