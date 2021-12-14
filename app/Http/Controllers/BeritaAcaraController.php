<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class BeritaAcaraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role != 'ppa') {
            $surats = Surat::where('jenis_surat', 'berita acara')->where('pengirim_id', Auth::user()->id)->get();

            return view('berita_acara.index', compact('surats'));
        }else{
            $surats = Surat::where('jenis_surat', 'berita acara')->get();

            return view('berita_acara.index', compact('surats'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita_acara.create');
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
            'judul' => ['required'],
            'tema' => ['required'],
            'tanggal_pelaksanaan' => ['required'],
            'ruang' => ['required'],
            'nama_tamu' => ['required']
        ]);
        Surat::create($request->all());

        return redirect()->route('berita_acara.index');
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
        $surat = Surat::find($id);

        return view('berita_acara.edit', compact('surat'));
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
            'judul' => ['required'],
            'tema' => ['required'],
            'tanggal_pelaksanaan' => ['required'],
            'ruang' => ['required'],
            'nama_tamu' => ['required']
        ]);
        Surat::find($id)->update($request->all());

        return redirect()->route('berita_acara.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Surat::find($id)->delete();

        return redirect()->back();
    }

    public function showValidasi($id)
    {
        $surat = Surat::find($id);
        $signs = Sign::all();
        return view('berita_acara.validasi', compact('surat', 'signs'));
    }

    public function takenValidasi(Request $request,$id)
    {
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
                'no_surat' => $kode.'/E/FTI/'. $year,
                'status' => $request->status,
                'sign_id' => $request->sign_id
            ]);

            // file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('berita_acara.index')->with('success', 'success Full upload signature');
        }else if($request->status == 'ditolak'){
            Surat::find($id)->update([
                'status' => $request->status,
                'alasan_ditolak' => $request->alasan_ditolak
            ]);

            return redirect()->route('surat_tugas.index')->with('success', 'success Full upload signature');
        }else{
            Surat::find($id)->update([
                'status' => $request->status,
            ]);

            return redirect()->route('berita_acara.index')->with('success', 'success Full upload signature');
        }
    }

    public function download($id)
    {
        $id;
        $item = Surat::find($id);
        $pdf = PDF::loadview('pdf.berita_acara', compact('item'));
    	return $pdf->stream();
    }
}
