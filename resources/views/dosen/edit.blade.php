@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Dosen / Ubah Dosen</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('dosen.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('dosen.update',$dosen->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="judul">Nidn</label>
                            <input class="form-control" id="nidn" type="text" placeholder="nidn" name="nidn" value="{{ old('nidn', $dosen->nidn) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" placeholder="nama" name="nama" value="{{ old('nama', $dosen->nama) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi">
                                <option ><-- Pilih Prodi --></option>
                                <option value="akuntansi" {{ old('prodi',$dosen->prodi) == "akuntansi" ? 'selected' : '' }}>Akuntansi</option>
                                <option value="manajemen" {{ old('prodi',$dosen->prodi) == "manajemen" ? 'selected' : '' }}>Manajemen</option>
                                <option value="perbankan syariah" {{ old('prodi',$dosen->prodi) == "perbankan syariah" ? 'selected' : '' }}>Perbankan syariah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" value="L" id="jenis_kelamin" type="radio" name="jenis_kelamin" @if(old('jenis_kelamin',$dosen->jenis_kelamin) == 'L') checked @endif checked>
                                <label class="form-check-label" for="flexRadioDefault1">laki - laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="P" id="jenis_kelamin" type="radio" name="jenis_kelamin" @if(old('jenis_kelamin',$dosen->jenis_kelamin) == 'P') checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nomer_hp">Nomer Handphone</label>
                            <input class="form-control" id="nomer_hp" type="text" placeholder="nomer handphone" name="nomer_hp" value="{{ old('nomer_hp',$dosen->nomer_hp) }}" required>
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection