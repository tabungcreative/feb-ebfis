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
                            <label for="judul">Kode Dosen</label>
                            <input class="form-control" id="kode_dosen" type="text" placeholder="kode_dosen" name="kode_dosen" value="{{ old('kode_dosen', $dosen->kode_dosen) }}" required>
                        </div>
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
                            <select class="form-control" id="prodi" name="prodi" required="required">
                                <option value="">Pilih Prodi</option>
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
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input class="form-control" id="tempat_lahir" type="text" placeholder="tempat lahir" name="tempat_lahir" value="{{ old('tempat_lahir',$dosen->tempat_lahir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="nik">NIK</label>
                            <input class="form-control" id="nik" type="text" placeholder="NIK" name="nik" value="{{ old('nik',$dosen->nik) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="lulusan_terakhir">Lulusan Terakhir</label>
                            <input class="form-control" id="lulusan_terakhir" type="text" placeholder="Masukkan Pendidikan Terakhir" name="lulusan_terakhir" value="{{ old('lulusan_terakhir',$dosen->lulusan_terakhir) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="keilmuan">Keilmuan</label>
                            <input class="form-control" id="keilmuan" type="text" placeholder="Masukkan Bidang Keilmuan" name="keilmuan" value="{{ old('keilmuan',$dosen->keilmuan) }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="text-danger">*</label>
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input class="" id="tanggal_lahir" type="date" placeholder="tanggal lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir',$dosen->tanggal_lahir) }}" required>
                        </div>
                        <button button type="submit" class="btn btn-primary">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
@endsection