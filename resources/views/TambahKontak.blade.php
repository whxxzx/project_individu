@extends('layout.admin')
@section('title','tambahkontak')
@section('content-title', 'Tambahkan Project Untuk ' .$siswa->nama)
@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('masterkontak.store') }}" method="POST">
            @csrf
        <div class="form-group">
            <input type="hidden" name="id_siswa" value="{{ $siswa->id }}" >
            <label for="nama">NAMA PROJECT</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project" >
        </div>
        <div class="form-group">
            <label for="nama">DESKRIPSI PROJECT</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="nama">TANGGAL PROJECT</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
        <div class="form-group">
            <a href="{{ route('masterproject.index') }}" class="btn btn-danger">Batal</a>
            <input type="submit" class="btn btn-success" value="simpan" >
        </div>
    <div>
    </div>
    </form>
    </div>
</div>
@endsection



