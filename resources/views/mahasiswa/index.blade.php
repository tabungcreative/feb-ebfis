@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Mahasiswa </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <!-- DataTales Example -->
            <div class="">
                <a class="btn btn-success mb-3" href="{{ route('mahasiswa.create') }}">
                    <i class="fas fa-plus"></i> Tambah Mahasiswa
                </a>
                <button class="btn btn-warning mb-3" data-toggle="modal" data-target="#modalImport"><i class="fas fa-file"></i> Import Mahasiswa</button>
            </div>
            <div class="card shadow mb-4">
                
                <div class="card-header bg-white d-flex align-items-center flex-row justify-content-around">
                    <h5 class="flex-grow-1">Daftar Mahasiswa</h5>
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
                                    <th>Nim</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->nim }}</td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->prodi }}</td>
                                        <td>{{ $data->jenis_kelamin == "L" ? 'laki-laki' : 'perempuan' }}</td>
                                        <td class="d-flex flex-col">
                                            {{-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#detailMahasiswa" id="detailMahasiswa" data-id="{{ $data->id }}"><i class="fas fa-info"></i></button> --}}
                                            <a href="{{ route('mahasiswa.edit', $data->id) }}">
                                                <div class="btn btn-primary mx-2"><i class="fas fa-edit"></i></div>
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy',$data->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger delete-confirm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>   
                                        </td>   
                                    </tr>
                                @endforeach
                                <!-- Import Modal --> 
                                <div class="modal fade" id="modalImport" tabindex="-1" role="dialog" aria-labelledby="modalImport" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalImport">Import Mahasiswa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/import-mahasiswa" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="text-danger">*</label>
                                                        <label for="gambar">File</label>
                                                        <input type="file" name="file" class="form-control" placeholder="file import" aria-label="file import" aria-describedby="button-addon2">
                                                    </div>
                                                    <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                                                    <a href="https://is3.cloudhost.id/storage-feb/assets/excel/template_mahasiswa.xlsx" target="_blank" class="btn btn-success" rel="noopener noreferrer">download template <i class="fas fa-download"></i> </a>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Detail Mahasiswa Modal --> 
                                <div class="modal fade" id="detailMahasiswa" tabindex="-1" role="dialog" aria-labelledby="detailMahasiswa" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailMahasiswa">Detail Mahasiswa</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               <p class="name" id="name"></p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                    <div class="mx-3 my-3">
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection