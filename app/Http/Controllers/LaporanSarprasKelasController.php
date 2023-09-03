<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Laporan;
use App\Models\SarprasKelas;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class LaporanSarprasKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mlaporankelas.index');
    }

    public function getLaporanSarprasKelas(Request $request) {
        if ($request->ajax()) {
            $param  = '/SPS/KLS';
            $data = Laporan::where('id_laporan','like','%'.$param.'%')
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $editBtn = '<a href="'. route("Pass.show", $row->id) .'" class="edit btn btn-success btn-sm mb-2">Edit</a>';

                    $deleteForm = '<form class="delete" action="' . route("Pass.destroy", $row->id) . '" method="POST" onsubmit="return confirm(\'Hapus Data Kelas Ini ?\')">
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
        $data = \App\Models\Kelas::all();

        return view('mlaporankelas.create', ['kelas' => $data]);
    }

    public function getExistedLaporanData($id)
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
        // Bikin Kode Unique
        $new_laporan = new \App\Models\Laporan();
        $param  = '/SPS/KLS';
        $carilap = Laporan::where('id_laporan','like','%'.$param.'%')->orderBy('id', 'DESC')->value('id_laporan');
        $count = Laporan::orderBy('created_at', 'DESC')->count();
        
        if ($count == 0) {
            # code...
            $idlap = "SMA-YAPPENDA/LAP/SPS/KLS/001";
        }else {
            # code...
            $delete = preg_replace('/\D/', '', $carilap);
            $idlap = 'SMA-YAPPENDA/LAP/SPS/KLS/'.str_pad($delete+1,3,"0",STR_PAD_LEFT);
        }
        // End Bikin Kode Unique
        

        // Prep Data
        $user   = Auth::user()->nama;
        // End Prep Data

        // Cari Data Kelas
        $carikelas  = Kelas::where('id_kelas','=', $request->get('kelas'))->first();
        // End Cari Data Kelas

        // Format Data
        $newdate        = date('Y-m-d', strtotime($request->get('tanggal')));
        $nama_laporan   = 'Laporan-Sarpras-'.$carikelas->nama_kelas.'-'.$newdate.'.pdf';
        $savePDF        = public_path('Laporan/Sarpras-Kelas/').$nama_laporan;
        // End Format Data

        // Insert Ke Database
        $new_laporan->id_laporan        = $idlap;
        $new_laporan->nama_laporan      = $nama_laporan;
        $new_laporan->tanggal_laporan   = $newdate;
        $new_laporan->file_laporan      = $savePDF;
        $new_laporan->update_by         = $user;

        $new_laporan->save();
        // End Insert Ke Database
        // Search Data Untuk Generate PDF
        $predata        = SarprasKelas::where('id_kelas_sarpras','=',$carikelas->id_kelas)->get()->all();
        $generatePDF    = PDF::loadView('mlaporankelas.laporan', ['data' => $predata,'i' => 0]);
        // End Search Data Untuk Generate PDF

        // Save PDF
        $generatePDF->save($savePDF);
        // End Save PDF

        return redirect()->route('print_laporan_sarpras', ['id' => $carikelas->id_kelas]);
    }

    public function print_laporan_sarpras($id)
    {
        $predata    = SarprasKelas::where('id_kelas_sarpras','=',$id)->get();
        
        $pdf = PDF::loadView('mlaporankelas.laporan', ['data' => $predata,'i' => 0]);
        return $pdf->stream("", array("Attachment" => false));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
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
    public function destroy(Laporan $laporan)
    {
        //
    }
}
