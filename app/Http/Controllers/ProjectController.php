<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Models\siswa;
use App\Models\project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = siswa::paginate(5);
        return view ('/masterproject' , compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    public function tambah($id)
    {
        $siswa=siswa::find($id);
        return view('TambahProject', compact('siswa'));
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
            'id_siswa' => 'required',
            'nama_project' => 'required|max:20|min:1',
            'deskripsi' => 'required',
            'tanggal' => 'required'
        ],);

        project::create($validateData);
        Session::flash('tambah', 'data anda tersimpan !!!');
        return redirect('/masterproject');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = siswa::find($id)->project()->get();
        return view( 'ShowProject', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project=project::find($id);
        return view ('EditProject', compact('project'));
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
            'nama_project'      => 'required|min:3|max:30',
            'tanggal'    => 'required',
            'deskripsi'     => 'required|min:10',
            
            
        ], $message);

        project::find($id)->update($validateData);
        Session::flash('update','PROJECT BERHASIL DIEDIT');
            return redirect('/masterproject');

            
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
        $project=project::find($id)->delete();
        Session::flash('hapus', 'Data berhasil dihapus');
        return redirect('/masterproject');
    }
}
