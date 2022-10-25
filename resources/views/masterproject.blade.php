@extends('layout.admin')
@section('title','masterproject')
@section('content-title', 'Master Project')
@section('content')

@if ($message = Session::get('tambah'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    {{-- message jika salah --}}
    @if ($message = Session::get('hapus'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    {{-- message jika berhasil update --}}
    @if ($message = Session::get('update'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert"></button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

<div class="row">
    <div class="col-lg-6">
        <div class="card shadow-mb-4 ">
            <div class="card-header bg-success ">
                <h6 class="m-0 font-weight-bold text-white"> Data Siswa</h6>
            </div>
            <div class="card-body">             
                <table class="table ">
                        <thead>
                            <tr>
                            <th scope="col ">NISN</th>
                            <th scope="col" >NAMA</th>
                            <th scope="col">ACTION</th>
                            </tr>
                        </thead>    
                        @foreach ($data as $item)
                                <tr>
                                    <td>{{$item ->nisn }}</td>
                                    <td>{{$item ->nama }}</td>
                                    
                                    <td class="text-center">
                                        <a class="btn-sm btn-info" onclick= "show ({{ $item->id}})"><i class="fas fa-folder-open"></i></a>
                                        <a href="{{ route('masterproject.tambah',$item->id) }}" class="btn-sm btn-success"><i class="fas fa-plus"></i></a>
                                    </td>
                                </tr> 
                               @endforeach
                                </table>
            <div class="card-footer d-flex justify-content-end">
                    {{ $data -> links() }}
            </div>        
        </div>
    </div>
</div>

    <div class="col-lg-6">
        <div class="card shadow-mb-4 ">
            <div class="card-header bg-success ">
                <h6 class="m-0 font-weight-bold text-white"> Project Siswa</h6>
            </div>
    <div id="project" class="card-body">
        <h6 class="text-center"> Pilih Siswa Terlebih Dahulu </h6>
    </div>
        </div>
    </div>
</div>


<script>
function show(id){
    $.get('masterproject/'+id, function(data){
        $('#project').html(data);
    })
}
</script>
@endsection