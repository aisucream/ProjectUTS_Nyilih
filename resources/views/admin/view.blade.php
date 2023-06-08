@extends('layouts.app')

@section('content')
    <div class="container-sm my-5">
        <div class="row justify-content-center">
            <div class="p-5 bg-light rounded-3 col-xl-4 border">
                <div class="mb-3 text-center">
                    <i class="bi bi-archive-fill text-primary fs-1"></i>
                    <h4>Detail Data</h4>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="namabarang" class="form-label">Nama Barang</label>
                        <h5>{{ $data->nama_barang }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <h5>{{ $data->stok }}</h5>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="namaruangan" class="form-label">Nama Ruangan</label>
                        <h5>{{ $data->ruangan->nama_ruangan }}</h5>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12 d-grid">
                        <a href="{{ route('barang') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                class="bi-arrow-left-circle me-2"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
