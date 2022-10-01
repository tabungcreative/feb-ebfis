@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Berita / Detail Berita </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-11 col-md-8 col-sm-6">
            <a class="btn btn-primary mb-3" href="{{ route('berita.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-row justify-content-around p-5">
                        <div class="row">
                            @if ($berita == null)   
                                <!-- 404 Error Text -->
                                <div class="text-center">
                                    <h1 class="h1 mx-auto">404</h1>
                                        <p class="lead text-gray-800 mb-5">Data Tidak Ditemukan</p>
                                        <p class="text-gray-500 mb-0">Sepertinya Anda menemukan kesalahan dalam matriks...</p>
                                    <a href="/">&larr; Kembali ke Dashboard</a>
                                </div>
                            @else
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="my-2">
                                            <h4 class="text-dark">{{ $berita->judul }}</h4>
                                            <small class="my-2 text-gray"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $berita->created_at }}</small>
                                            <small class="my-2 text-gray ms-5"><i class="fa fa-user" aria-hidden="true"></i> Oleh : {{ $berita->penulis }}</small>
                                        </div>
                                    </div>
                                    <img src="{{ $berita->gambar_url }}" class="img-fluid mb-5" width="100%">
                                    <p>
                                        {!! $berita->isi !!}
                                    </p>
                                </div> 
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </div>
@endsection