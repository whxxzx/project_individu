@extends('layout.admin')
@section('title','tambahjeniskontak')
@section('content-title', 'Tambahkan Jenis Kontak ')
@section('content')
<div class="card">
    <div class="card-body">

        <form action="{{ route('tambahjeniskontak.store') }}" method="POST">
            @csrf
        <div class="form-group">
            <label for="nama">NAMA APLIKASI</label>
            <input type="text" class="form-control" id="jenis_kontak" name="jenis_kontak" >
        </div>
        <div class="form-group">
            <a href="{{ route('tambahjeniskontak.index') }}" class="btn btn-danger">Batal</a>
            <input type="submit" class="btn btn-success" value="simpan" >
        </div>
    <div>
    </div>
    </form>
    </div>
</div>
@endsection



