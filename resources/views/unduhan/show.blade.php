@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard / Unduhan / Detail Unduhan </h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <a class="btn btn-primary mb-3" href="{{ route('unduhan.index') }}">
                <i class="fa fa-arrow-left"></i> Kembali
            </a>
            <div class="card">
                <div class="card-body">
                    <div class="p-5">
                        <div class="row">
                            @if ($unduhan == null)   
                                <!-- 404 Error Text -->
                                <div class="text-center">
                                    <h1 class="h1 mx-auto">404</h1>
                                        <p class="lead text-gray-800 mb-5">Data Tidak Ditemukan</p>
                                        <p class="text-gray-500 mb-0">Sepertinya Anda menemukan kesalahan dalam matriks...</p>
                                    <a href="/">&larr; Kembali ke Dashboard</a>
                                </div>
                            @else
                                <div class="col-lg-12">
                                    <div class="row">
                                        <div class="my-2">
                                            <h4 class="text-dark">{{ $unduhan->judul }}</h4>
                                            <small class="my-2 text-gray"><i class="fa fa-calendar" aria-hidden="true"></i> {{ $unduhan->created_at }}</small>
                                        </div>
                                        <embed src="{{asset('storage/' . $unduhan->file_path)}}" type="application/pdf" width="100%" height="400px">
                                    </div>
                                    {{-- <a target="_blank" href="{{ $unduhan->file_url }}">Preview</a> --}}
                                    <p>
                                        {!! $unduhan->isi !!}
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