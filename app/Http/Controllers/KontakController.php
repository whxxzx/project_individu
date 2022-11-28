<?php

namespace App\Http\Controllers;

use App\Models\jenis_kontak;
use App\Models\kontak;
use App\Models\siswa;
use Illuminate\Http\Request;
use Session;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('admin')->except('index', 'show');
    // }
    public function index()
    {
        $student = siswa::paginate(7);
        $jenis_kontak = jenis_kontak::all();
        return view('masterkontak', compact('student', 'jenis_kontak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { $siswa = siswa::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('TambahKontak', compact('siswa', 'jenis_kontak'));
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
        
        $message = [
            'required' => ':attribute harus diisi gaess',
            'min' => ':attribute minimal :min karakter ya coy',
            'max' => 'attribute makasimal :max karakter gaess',
        ];
        $validateData = $request->validate([], $message);

        kontak::create([
            'id_siswa' => $request->id_siswa,
            'jenis_kontak' => $request->sosmed,
            
        ]);
        Session::flash('benar', 'Selamat!!! Kontak Anda Berhasil Ditambahkan');
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
        return view('ShowKontak', compact('kontak'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kontak = kontak::find($id);
        $jenis_kontak = jenis_kontak::all();
        return view('/EditKontak', compact('kontak', 'jenis_kontak'));
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
            'required' => ';attribute isi woi',
            'min' => ':attribute minimal :min karakter woi',
            'max' => ':attribute maksimal :max karakter woi'
        ];
        $validateData = $request->validate([
            'nama_jenis_kontak' => 'required'
            
        ], $message);

        $kontak = kontak::find($id);
        $kontak->jenis_kontak_id = $request->sosmed;
        $kontak->deskripsi = $request->deskripsi;
        $kontak->save();
        // kontak::find($id)->update($validateData);
        Session::flash('update', 'Selamat!!! Kontak Anda Berhasil Diupdate');
        return redirect('/masterkontak');
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
        $siswa = kontak::find($id)->delete();
        Session::flash('danger', 'Data Berhasil Dihapus :(');
        return redirect('/masterkontak');
    }
}