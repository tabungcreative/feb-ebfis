@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Berita / Tambah Berita</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('berita.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('berita.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="judul">Judul Berita</label>
                            <input class="form-control" id="judul" type="text" placeholder="judul berita" name="judul" value="{{ old('judul') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="isi">Isi Berita</label>
                            <textarea name="isi" id="isi" cols="30" rows="10" class="form-control ckeditor" required>{{ old('isi') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="gambar">Thumbnail</label>
                            <input class="form-control" id="gambar" type="file" placeholder="gambar" name="gambar">
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="penulis">Editor</label>
                            <input class="form-control" id="penulis" type="text" placeholder="Penulis" name="penulis" value="{{ old('penulis') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="created_at">Tanggal Berita</label>
                            <input class="form-control" id="created_at" type="date" placeholder="Penulis" name="created_at" value="{{ old('created_at') }}" required>
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection