@extends('layout.admin')
@section('title','tambahkontak')
@section('content-title', 'Tambahkan Kontak Untuk ' .$siswa->nama)
@section('content')
<div class="card shadow-lg p-3 mb-5 bg-white rounded">
    <div class="card-body">
        @if (count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                <li>{{$item}}</li>
                @endforeach
            </ul>
        </div> 
        @endif
        <form action="{{route ('masterkontak.store')}}" method="post">
            @csrf
            <div class="form-group">
                <input type="hidden" name="siswa_id" value="{{$siswa->id}}">
                <label for="jenis_kontak_id">Jenis Kontak</label>
                <select class=" form-select form-control" id="jenis_kontak_id" name="jenis_kontak_id">
                    @foreach ($jenis_kontak as $item)
                        <option value="{{ $item->id }}">{{ $item->jenis_kontak}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Deskripsi kontak</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" value="simpan" class="btn btn-success">
                <a href="{{ route('masterkontak.index')}}" class="btn btn-danger">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection



