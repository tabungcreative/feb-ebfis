@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Fasilitas </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <!-- DataTales Example -->
            <div class="">
                <a class="btn btn-success mb-3" href="{{ route('fasilitas.create') }}">
                    <i class="fas fa-plus"></i> Tambah Fasilitas
                </a>
            </div>
            <div class="card shadow mb-4">
                
                <div class="card-header bg-white d-flex align-items-center flex-row justify-content-around">
                    <h5 class="flex-grow-1">Daftar Fasilitas</h5>
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="hidden" value="100" name="size">
                            <input type="text" name="key" class="form-control bg-light border-0 small" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search31" value="{{ $_GET['key'] ?? '' }}"/>
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>    
                <div class="card-body">
                    
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($fasilitas as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nama_fasilitas }}</td>
                                        <td class="d-flex flex-col">
                                            <a href="{{ route('fasilitas.show', $data->id) }}">
                                                <div class="btn btn-info "><i class="fas fa-info"></i></div>
                                            </a>
                                            <a href="{{ route('fasilitas.edit', $data->id) }}">
                                                <div class="btn btn-primary mx-2"><i class="fas fa-edit"></i></div>
                                            </a>
                                            <form action="{{ route('fasilitas.destroy',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger delete-confirm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>    
                                        </td>   
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3 my-3">
                        {{ $fasilitas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection