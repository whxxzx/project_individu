@extends('layout.admin')
@section('title','Edit Project')
@section('content-title', 'Edit Project')
@section('content')
    

<div class="card">
    <div class="card-body">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                    <li>{{$item}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" enctype="multipart/form-data" action="{{ route('masterproject.update', $project->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_project">NAMA PROJECT</label>
            <input type="text" class="form-control" id="nama_project" name="nama_project"  value="{{ $project->nama_project }}">
        </div>
        <div class="form-group">
            <label for="deskripsi">DESKRIPSI PROJECT</label>
            <textarea name="deskripsi" id="deskripsi" class="form-control"  value="{{ $project->deskripsi }}"></textarea>
        </div>
        <div class="form-group">
            <label for="tanggal">TANGGAL PROJECT</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal"  value="{{ $project->tanggal }}">
        </div>
        <div class="form-group">
            <a class="btn btn-danger">Batal</a>
            <input type="submit" class="btn btn-success" value="simpan">
        </div>
    <div>
    </div>
    </form>
@endsection