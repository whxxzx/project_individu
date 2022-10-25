@extends('layout.admin')
@section('title','showsiswa')
@section('content-title', 'Data Siswa')
@section('content')

<div class ="row">
    <div class ="col-lg-4">
    {{-- Kartu Satu --}}
        <div class="card shadow-mb-4 ">
            <div class="card-header bg-success ">
                {{-- <h6 class="m-0 font-weight-bold text-white"><i class="fas fa quote-left"></i>Nama siswa</h6> --}}
            </div>
            <div class ="card-body ">
                <div class ="card-body text-center">
                <img src="{{asset('/template/img/'.$siswa->foto)}}" width="150" class="square border-0 mt-8 mx-auto img-thumbnail" alt="">
                <h5 >{{$siswa->nama}}</h5>
                <h6> <i class="fas fa-id-card"></i> {{$siswa->nisn}}</h6>
                <h6><i class="fas fa-location-arrow"></i> {{$siswa->alamat}}</h6>
                <h6> {{$siswa->jk}}</h6>
                
            </div>
        </div>
        </div>
    {{-- Kartu dua --}}
    <div class="card shadow-mb-4">
        <div class="card-header bg-success">
            <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-user-plus"></i> Kontak</h6>
        </div>
        <div class ="card-body text-center">
            @foreach ($kontaks as $kontak)
            <li>{{$kontak->jenis_kontak}} : {{$kontak->pivot->deskripsi}}</li>
            @endforeach
        </div>
    </div>
</div>
{{-- kartu Tiga --}}
    <div class ="col-lg-8">
        <div class="card shadow-mb-4">
            <div class="card-header bg-success">
                <h6 class="m-0 font-weight- text-white"><i class="fas fa-quote-left"></i> About Siswa</h6>  
            </div>
            
            <div class ="card-body text-justify">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">{{ $siswa->about }}</p>
                    <footer class="blockquote-footer">Ditulis Oleh <cite title="Source Title">{{ $siswa->nama }}</cite></footer>
                  </blockquote>   
        </div>
    </div>

        {{-- kartu empat --}}
        <div class="card shadow-mb-4">
            <div class="card-header bg-success">
                <h6 class="m-0 font-weight-bold text-white"><i class="fas fa-tasks"></i> Project Siswa</h6>
            </div>
            <div class ="card-body text-center">
            </div>
        </div>
    </div>
</div>
@endsection