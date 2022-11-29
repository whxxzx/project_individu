<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\jenis_kontak;
use App\Models\kontak;
class JenisKontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        return view ('/masterkontak' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambahjeniskontak');
    }

    public function tambah($id)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData=$request->validate([
            'jenis_kontak' => 'required|max:20|min:1'
            
        ],);

        jenis_kontak::create($validateData);
        Session::flash('tambah', 'data anda tersimpan !!!');
        return redirect('/masterkontak');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontak = siswa::find($id)->kontak()->get();
        return view( 'ShowKontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jenis_kontak=jenis_kontak::find($id);
        return view ('EditKontak', compact('kontak'));
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
        $message = [
            'required'  => ':attribute harus diisi ngab',
            'min'       => ':attribute minimal :min karakter ya ngab',
            'max'       => 'nama anda terlalu panjang',
            
            
        ];

        $validateData=$request->validate([
            'jenis_kontak'      => 'required|min:3|max:30'
            
            
        ], $message);

        jenis_kontak::find($id)->update($validateData);
        Session::flash('update','KONTAK BERHASIL DIEDIT');
            return redirect('/masterkontak');

            
        // } else {
        //     $siswa=siswa::find($id);
        //     $siswa->nama    = $request->nama;
        //     $siswa->deskripsi    = $request->deskripsi;
        //     $siswa->tanggal    = $request->tanggal;
        //     $siswa->save();
        //     return redirect('/masterproject');

        
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

    public function hapus($id)
    {
        $jenis_kontak=jenis_kontak::find($id)->delete();
        Session::flash ('hapus', 'Data berhasil dihapus');
        return redirect('/masterkontak');
    }
}
