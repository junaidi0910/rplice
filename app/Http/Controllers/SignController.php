<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $signs = Sign::all();

        return view('sign.index', compact('signs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'dosen')->get();

        return view('sign.create', compact('users'));
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
            'user_id' => ['required', 'unique:signs'],
        ],[
            'user_id.required' => 'Harap Isi Kolom Dosen',
            'user_id.unique' => 'Dosen Sudah Mengisi Tanda Tangan'
        ]);
        $folderPath = public_path('upload/');
            $image_parts = explode(";base64,", $request->signed);

              
            $image_type_aux = explode("image/", $image_parts[0]);

            

            $image_type = $image_type_aux[1];

            // $year = date('Y');

            $image_base64 = base64_decode($image_parts[1]);

            
            $name = uniqid() . '.' . $image_type;
            // $file = $folderPath . uniqid() . '.'.$image_type;

            // 
            
            Sign::create([
                'user_id' => $request->user_id,
                'signs' => $name
            ]);

            file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('tanda.index')->with('success', 'success Full upload signature');
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
        $sign = Sign::find($id);

        return view('sign.edit', compact('sign'));
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
            $image_parts = explode(";base64,", $request->signed);

              
            $image_type_aux = explode("image/", $image_parts[0]);

            

            $image_type = $image_type_aux[1];

            // $year = date('Y');

            $image_base64 = base64_decode($image_parts[1]);

            
            $name = uniqid() . '.' . $image_type;
            // $file = $folderPath . uniqid() . '.'.$image_type;

            // 
            
            Sign::find($id)->update([
                'user_id' => $request->user_id,
                'signs' => $name
            ]);

            file_put_contents(public_path('upload/') . $name, $image_base64);

            return redirect()->route('tanda.index')->with('success', 'success Full upload signature');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sign::find($id)->delete();

        return redirect()->back();
    }
}
