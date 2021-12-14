<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class TugasPribadiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'ppa') {
            $surats = Surat::where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->get();

            return view('tugas_pribadi.index', compact('surats'));
        }else{
            $surats = Surat::where('jenis_surat', 'pribadi')->get();

            return view('tugas_pribadi.index', compact('surats'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tugas_pribadi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'tanggal_pelaksanaan' => ['required'],
            'lokasi_pelaksanaan' => ['required'],
            'nama_mitra' => ['required'],
        ]);
        $surat = Surat::create([
            'pengirim_id' => $request->pengirim_id,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
            'jenis_surat' => $request->jenis_surat,
            'nama_mitra' => $request->nama_mitra,
            'keterangan' => $request->keterangan,
            'status' => 'proses'
        ]);

        return redirect()->route('tugas_pribadi.index')->with('success', 'Tugas Pribadi Berhasil Dibuat');
    }

    public function destroy($id)
    {
        Surat::find($id)->delete();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Surat::find($id);
        $signs = Sign::all();

        return view('tugas_pribadi.validasi', compact('item', 'signs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Surat::find($id);

        return view('tugas_pribadi.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'tanggal_pelaksanaan' => ['required'],
            'lokasi_pelaksanaan' => ['required'],
            'nama_mitra' => ['required'],
        ]);
        $surat = Surat::find($id);

        $surat->update([
            'pengirim_id' => $request->pengirim_id,
            'tanggal_pelaksanaan' => $request->tanggal_pelaksanaan,
            'lokasi_pelaksanaan' => $request->lokasi_pelaksanaan,
            'jenis_surat' => $request->jenis_surat,
            'nama_mitra' => $request->nama_mitra,
            'keterangan' => $request->keterangan,
            'status' => $request->status
        ]);

        return redirect()->route('tugas_pribadi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function validasi(Request $request, $id)
    {
        // $folderPath = public_path('upload/');
        if ($request->status == 'disetujui') {

            $year = date('Y');


            $len = strlen($id);

            if ($len == 1) {
                $kode = '00' . (string)$id;
            }else if($len == 2){
                $kode = '0' . (string)$id;
            }else{
                $kode = (string)$id;
            }

            Surat::find($id)->update([
                'no_surat' => $kode.'/D/FTI/'. $year,
                'status' => $request->status,
                'sign_id' => $request->sign_id,
                'alasan_ditolak' => NULL
            ]);

            // file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('tugas_pribadi.index')->with('success', 'success Full upload signature');
        }else if($request->status == 'ditolak'){
            Surat::find($id)->update([
                'status' => $request->status,
                'alasan_ditolak' => $request->alasan_ditolak
            ]);

            return redirect()->route('tugas_pribadi.index')->with('success', 'success Full upload signature');
        }
        else{
            Surat::find($id)->update([
                'status' => $request->status,
            ]);

            return redirect()->route('tugas_pribadi.index')->with('success', 'success Full upload signature');
        }
        // dd(date('Y'));
    
    }

    public function download($id)
    {
        $item = Surat::find($id);

        $pdf = PDF::loadview('pdf.tugas_pribadi', compact('item'))->setPaper('a4');
    	return $pdf->stream('laporan-pegawai-pdf');
    }
}
