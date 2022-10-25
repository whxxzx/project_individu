@extends('layout.admin')
@section('title','masterkontak')
@section('content-title', 'Master Kontak')
@section('content')
    
    <!--Modal Tambah Data-->
    <div class="col-lg-12">
        <div class="card shadow mb-4">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal" data-whatever> Tambah Jenis Kontak</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark" id="exampleModalLabel"><b>Tambah Jenis Kontak</b></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="form-grup" style="padding:2%">
                            <form method="post" enctype="multipart/form-data" action="{{ route('masterkontak.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Aplikasi</label>
                                    <input type="text" class="form-control" id="nama" name='nama'>
                                </div>
                                <div class="modal-footer">
                                    <a href="{{ route('masterkontak.index') }}" class="btn btn-danger">Batal</a>
                                    <input type="submit" class="btn btn-success" value="Simpan">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-success text-white">
                                    <tr>
                                        <th scope="col">NO</th>
                                        <th scope="col">JENIS KONTAK</th>
                                        <th scope="col">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $i => $item)
                                        <tr>
                                            <th scope="row">{{ ++$i }}</th>
                                            <td>{{ $item->jenis_kontak }}</td>
                                            <td>
                                                <a href="{{ route('masterkontak.edit', $item->id) }}" class="btn btn-sm btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('masterkontak.destroy', $item ->id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                
                <!--Data Siswa-->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card shadow-mb-4">
                            <div class="card-header bg-success">
                                <h6 class="m-0 font-weight-bold text-white">Data Siswa</h6>
                            </div>
                            <div class="card-body ">

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">NISN</th>
                                            <th scope="col">NAMA</th>
                                            <th scope="col">ACTION</th>
                                        </tr>
                                    </thead>
                                    @foreach ($data as $item)
                                        <tbody>
                                            <tr>
                                                <th>{{ $item->nisn }}</th>
                                                <th>{{ $item->nama }}</th>

                                                <td class="text-center">
                                                    <a class="btn-warning" onclick="show({{ $item->id }})"><i
                                                            class="btn-sm info fas fa-folder-open"></i></a>
                                                    <a class="btn-success"
                                                        href="{{ route('masterkontak.create', $item->id) }}"><i
                                                            class="btn-sm success fas fa-plus"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    @endforeach
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card shadow-mb-4">
                            <div class="card-header bg-success">
                                <h6 class="m-0 font-weight-bold text-white">Kontak Pribadi Siswa</h6>
                            </div>
                            <div class="card-body " id="project">
                                <div class="text-center">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            
                <script>
                    function show(id) {
                        $.get('masterkontak/' + id, function(data) {
                            $('#kontak').html(data);
                        })

                    }
                </script>
            </div>
            </div>
     
@endsection