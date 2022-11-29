@extends('layout.admin')
@section('title','masterkontak')
@section('content-title', 'Master Kontak')
@section('content')
    
    <!--Modal Tambah Data-->
                                   

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
                        @foreach ($jenis_kontak as $i => $item)
                            <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->jenis_kontak }}</td>
                                    <td>
                                        <a href="{{ route('tambahjeniskontak.hapus', $item ->id) }}" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a>  
                                    </td>
                            </tr>
                        </tbody>
                        @endforeach
                                <a href="{{ route('tambahjeniskontak.create')}}" class="btn btn-success mb-4">Tambah Kontak</a>
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
                        @csrf
                            <thead>
                                <tr>
                                    <th scope="col">NISN</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">ACTION</th>
                                </tr>
                            </thead>
                                @foreach ($student as $item)
                                    <tbody>
                                        <tr>
                                            <th>{{$item -> nisn }}</th>
                                            <th>{{$item -> nama }}</th>
                                            <td class="text-center">
                                                <a class="btn-warning btn-sm btn-circle" onclick="show ({{ $item->id }})">
                                                    <i class="btn-sm info fas fa-phone"></i>
                                                </a>
                                                <a class="btn-success btn-sm btn-circle" href="{{ route('masterkontak.tambah', $item->id) }}">
                                                    <i class="btn-sm info fas fa-plus"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                @endforeach
                            </table>
                        
                <div class="card-footer d-flex justify-content-center">
                    {{ $student->links()}}
                </div>
            </div>
        </div>
</div>

        <div class="col-lg-6">
            <div class="card shadow-mb-4">
                <div class="card-header bg-success">
                    <h6 class="m-0 font-weight-bold text-white">Kontak Pribadi Siswa</h6>
                </div>
                        <div class="card-body" id="kontak">
                            <div class="text-center">
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

            
     
@endsection