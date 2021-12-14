<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\SuratDaftarHadir;
use Illuminate\Http\Request;
use PDF;

class SuratDaftarHadirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surats = SuratDaftarHadir::all();

        return view('surat_daftar_hadir.index', compact('surats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $signs = Sign::all();
        return view('surat_daftar_hadir.create', compact('signs'));
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
            'nama_kegiatan' => ['required'],
            'tanggal' => ['required'],
            'pembicara' => ['required'],
            'tempat' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'sign_id' => ['required'],
            'jumlah_peserta' => ['required']
        ]);
        if(SuratDaftarHadir::first() == NULL){
            $y = date('Y');
            SuratDaftarHadir::create([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tanggal' => $request->tanggal,
                'pembicara' => $request->pembicara,
                'tempat' => $request->tempat,
                'start' => $request->start,
                'end' => $request->end,
                'sign_id' => $request->sign_id,
                'kode_surat' => '001/C/FTI/'.$y,
                'jumlah_peserta' => $request->jumlah_peserta
            ]);

            return redirect()->route('surat_daftar_hadir.index');
        }else{
            $y = date('Y');
            $surat = SuratDaftarHadir::create([
                'nama_kegiatan' => $request->nama_kegiatan,
                'tanggal' => $request->tanggal,
                'pembicara' => $request->pembicara,
                'tempat' => $request->tempat,
                'start' => $request->start,
                'end' => $request->end,
                'sign_id' => $request->sign_id,
                'kode_surat' => '001/C/FTI/'.$y,
                'jumlah_peserta' => $request->jumlah_peserta
            ]);

            $id = $surat->id;
            if (strlen($id) == 1) {
                SuratDaftarHadir::find($id)->update([
                    'kode_surat' => '00'.$id.'/C/FTI/'.$y
                ]);
            }else if(strlen($id) == 2){
                SuratDaftarHadir::find($id)->update([
                    'kode_surat' => '0'.$id.'/C/FTI/'.$y
                ]);
            }else{
                SuratDaftarHadir::find($id)->update([
                    'kode_surat' => $id.'/C/FTI/'.$y
                ]);
            }

            return redirect()->route('surat_daftar_hadir.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $signs = Sign::all();
        $surat = SuratDaftarHadir::find($id);

        return view('surat_daftar_hadir.edit', compact('surat', 'signs'));
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
            'nama_kegiatan' => ['required'],
            'tanggal' => ['required'],
            'pembicara' => ['required'],
            'tempat' => ['required'],
            'start' => ['required'],
            'end' => ['required'],
            'sign_id' => ['required'],
            'jumlah_peserta' => ['required']
        ]);
        SuratDaftarHadir::find($id)->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal' => $request->tanggal,
            'pembicara' => $request->pembicara,
            'tempat' => $request->tempat,
            'start' => $request->start,
            'end' => $request->end,
            'sign_id' => $request->sign_id,
            'jumlah_peserta' => $request->jumlah_peserta
            // 'kode_surat' => '001/C/FTI/'.$y
        ]);

        return redirect()->route('surat_daftar_hadir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SuratDaftarHadir::find($id)->delete();

        return redirect()->back();
    }

    public function unduh($id)
    {
        $item = SuratDaftarHadir::find($id);
        $pdf = PDF::loadview('pdf.surat_daftar_hadir',compact('item'));
    	return $pdf->stream();
    }
}
