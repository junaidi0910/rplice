<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratDaftarHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'ppa') {
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->get());
        $kelompoks = count(Surat::where('jenis_surat', 'tugas')->get());
        $acaras = count(Surat::where('jenis_surat', 'berita acara')->get());
        $hadirs = count(SuratDaftarHadir::all());

        return view('welcome', compact('pribadis', 'kelompoks', 'acaras', 'hadirs'));
        }else if(Auth::user()->role == 'dosen')
        {
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->get());
        $acaras = count(Surat::where('jenis_surat', 'berita acara')->where('pengirim_id', Auth::user()->id)->get());

        return view('welcome', compact('acaras', 'pribadis'));
        }else{
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->get());
        $kelompoks = count(Surat::where('jenis_surat', 'tugas')->where('pengirim_id', Auth::user()->id)->get());

        return view('welcome', compact('pribadis', 'kelompoks'));
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
