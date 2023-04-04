<?php

namespace App\Http\Controllers;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Session as FacadesSession;


class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = mahasiswa::orderBy('nim','desc')->get();
        return view('mahasiswa.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('mahasiswa.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        FacadesSession :: flash('nim',$request->nim);
        FacadesSession :: flash('nama',$request->nama);
        FacadesSession :: flash('konsentrasi',$request->konsentrasi);

        $request->validate([
            'nim'=>'required|numeric|unique:mahasiswa,nim',
            'nama'=>'required',
            'konsentrasi'=>'required',
        ],[
            'nim.required'=>'nim wajib diisi',
            'nim.numeric'=>'nim wajib angka',
            'nim.unique'=>'nim yang diisi suda ada dalam db',
            'nama.required'=>'nama wajib diisi',
            'konsentrasi.required'=>'konsentrasi wajib disi',
        ]);
        
        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'konsentrasi' => $request->konsentrasi,
        ];
        mahasiswa::create($data);
        return redirect()->to('mahasiswa')->with('success'.'input data berhasil');
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
    public function edit(string $id)
    {
        //
        $data =mahasiswa::where('nim',$id)->first();
        return view('mahasiswa.edit')->with('data',$data);

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
        $request->validate([
            'nama'=>'required',
            'konsentrasi'=>'required',
        ],[
            'nama.required'=>'nama wajib diisi',
            'konsentrasi.required'=>'konsentrasi wajib disi',
        ]);
        
        $data = [
            'nama' => $request->nama,
            'konsentrasi' => $request->konsentrasi,
        ];
        mahasiswa::where('nim',$id)->update($data);
        return redirect()->to('mahasiswa')->with('success'.'update data berhasil');
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
