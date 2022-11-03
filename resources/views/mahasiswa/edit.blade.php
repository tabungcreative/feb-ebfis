@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Mahasiswa / Ubah Mahasiswa</h1>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('mahasiswa.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <form action="{{ route('mahasiswa.update',$mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nim">Nim</label>
                            <input class="form-control" id="nim" type="text" placeholder="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nama">Nama</label>
                            <input class="form-control" id="nama" type="text" placeholder="nama" name="nama" value="{{ old('nama',$mahasiswa->nama) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="prodi">Prodi</label>
                            <select class="form-control" id="prodi" name="prodi" required="required">
                                <option value="">Pilih Prodi</option>
                                <option value="akuntansi" {{ old('prodi',$mahasiswa->prodi) == "akuntansi" ? 'selected' : '' }}>Akuntansi</option>
                                <option value="manajemen" {{ old('prodi',$mahasiswa->prodi) == "manajemen" ? 'selected' : '' }}>Manajemen</option>
                                <option value="perbankan syariah" {{ old('prodi',$mahasiswa->prodi) == "perbankan syariah" ? 'selected' : '' }}>Perbankan syariah</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" value="L" id="jenis_kelamin" type="radio" name="jenis_kelamin" @if(old('jenis_kelamin',$mahasiswa->jenis_kelamin) == 'L') checked @endif checked>
                                <label class="form-check-label" for="flexRadioDefault1">laki - laki</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" value="P" id="jenis_kelamin" type="radio" name="jenis_kelamin" @if(old('jenis_kelamin',$mahasiswa->jenis_kelamin) == 'P') checked @endif>
                                <label class="form-check-label" for="flexRadioDefault2">perempuan</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nomer_hp">Nomer Handphone</label>
                            <input class="form-control" id="nomer_hp" type="text" placeholder="nomer handphone" name="nomer_hp" value="{{ old('nomer_hp',$mahasiswa->nomer_hp) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" id="tempat_lahir" type="text" placeholder="tempat lahir" name="tempat_lahir" value="{{ old('tempat_lahir',$mahasiswa->tempat_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nik">NIK</label>
                            <input class="form-control" id="nik" type="text" placeholder="NIK" name="nik" value="{{ old('nik',$mahasiswa->nik) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input class="form-control" id="tahun_masuk" type="number" placeholder="Masukkan tahun masuk" name="tahun_masuk" value="{{ old('tahun_masuk',$mahasiswa->tahun_masuk) }}">
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="" id="tanggal_lahir" type="date" placeholder="tanggal lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir',$mahasiswa->tanggal_lahir) }}" required>
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection