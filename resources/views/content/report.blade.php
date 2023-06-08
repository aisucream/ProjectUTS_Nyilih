@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('report.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-wrench-adjustable-circle-fill fs-1 text-primary"></i>
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label ">Nama</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="firstName" readonly value="{{ Auth::user()->name }}"">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="jenis" class="form-label">Jenis Report</label>
                            <select name="jenis" id="jenis" class="form-select @error('jenis') is-invalid @enderror">
                                <option value="Bug Aplikasi">Bug Aplikasi</option>
                                <option value="Keluhan">Keluhan</option>
                                <option value="Kualitas Barang">Kualitas Barang</option>
                            </select>
                            @error('jenis')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <input class="form-control @error('keterangan') is-invalid @enderror" type="text"
                                name="keterangan" id="keterangan" placeholder="Keterangan Report..." maxlength="100">
                            @error('keterangan')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                            <small class="form-text text-muted" style="float: right;">Maksimal 100 kata</small>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('home') }}" class="btn btn-outline-dark btn-lg mt-3"><i
                                    class="bi-arrow-left-circle me-2"></i> Cancel</a>
                        </div>
                        <div class="col-md-6 d-grid">
                            <button type="submit" class="btn btn-dark btn-lg mt-3"><i class="bi-check-circle me-2"></i>
                                Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
