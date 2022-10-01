@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Fasilitas / Tambah Fasilitas</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('fasilitas.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('fasilitas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nama_fasilitas">Nama Fasilitas</label>
                            <input class="form-control" id="nama_fasilitas" type="text" placeholder="Nama fasilitas" name="nama_fasilitas" value="{{ old('nama_fasilitas') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="isi">Deskripsi</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control ckeditor" required>{{ old('isi') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="gambar">Gambar</label>
                            <input class="form-control" id="gambar" type="file" placeholder="gambar" name="gambar">
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection