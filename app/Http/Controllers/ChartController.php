<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\SuratDaftarHadir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChartController extends Controller
{
    public function chart()
    {
        if (Auth::user()->role == 'ppa') {
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->get());
        $kelompoks = count(Surat::where('jenis_surat', 'tugas')->get());
        $acaras = count(Surat::where('jenis_surat', 'berita acara')->get());
        $hadirs = count(SuratDaftarHadir::all());

        return response()->json([
            'pribadis' => $pribadis,
            'kelompoks' => $kelompoks,
            'acaras' => $acaras,
            'hadirs' => $hadirs
        ]);
        }else if(Auth::user()->role == 'dosen')
        {
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->get());
        $acaras = count(Surat::where('jenis_surat', 'berita acara')->where('pengirim_id', Auth::user()->id)->get());

        return response()->json([
            'acaras' => $acaras,
            'pribadis' => $pribadis,
        ]);
        }else{
            $pribadis = count(Surat::where('jenis_surat', 'pribadi')->where('pengirim_id', Auth::user()->id)->get());
        $kelompoks = count(Surat::where('jenis_surat', 'tugas')->where('pengirim_id', Auth::user()->id)->get());

        return response()->json([
            'pribadis' => $pribadis,
            'kelompoks' => $kelompoks,
        ]);
        }
    }
}
