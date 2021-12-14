<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratDaftarHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArsipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'mahasiswa') {
            $pribadis = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->paginate(5);
            $kelompoks = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'tugas')->where('pengirim_id', Auth::user()->id)->paginate(5);
            $acaras = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'berita acara')->where('pengirim_id', Auth::user()->id)->paginate(5);
            $dosens = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'tugas dosen')->where('pengirim_id', Auth::user()->id)->paginate(5);
            $hadirs = SuratDaftarHadir::paginate(5);

            return view('arsip.index', compact('pribadis', 'kelompoks', 'acaras', 'dosens', 'hadirs'));
        }else{
            $pribadis = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'pribadi')->paginate(5);
            $kelompoks = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'tugas')->paginate(5);
            $acaras = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'berita acara')->paginate(5);
            $dosens = Surat::where('no_surat', '!=' , NULL)->where('jenis_surat', 'tugas dosen')->paginate(5);
            $hadirs = SuratDaftarHadir::paginate(5);
            // dd($kelompoks);
    
            return view('arsip.index', compact('pribadis', 'kelompoks', 'acaras', 'dosens', 'hadirs'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
