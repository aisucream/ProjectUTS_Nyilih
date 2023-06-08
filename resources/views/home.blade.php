@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h4>{{ $pageTitle }}</h4>
        <hr>

        <div class="d-flex align-items-center py-2 px-4 bg-light rounded-3 border">
            <div class="bi-house-fill me-3 fs-1"></div>
            <h4 class="mb-0">Selamat Datang {{ Auth::user()->name }} !</h4>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center py-2 px-4 ">
                            <div class="bi bi-box-seam-fill me-3 fs-1 text-success"></div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <h5 class="card-title">{{ $barang }} Barang</h5>
                                <p class="card-text text-success">Masih Tersedia</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center py-2 px-4 ">
                            <div class="bi bi-person-hearts me-3 fs-1 text-primary"></div>
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <h5 class="card-title">{{ $user }} Pengguna</h5>
                                <p class="card-text text-primary">Menggunakan Aplikasi Ini</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Auth::user()->level == 'admin')
            <div class="row mt-3">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center py-2 px-4 ">
                                <div class="bi bi-file-text-fill me-3 fs-1 text-warning"></div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <h5 class="card-title">{{ $pinjam }} Peminjaman</h5>
                                    <p class="card-text text-warning">yang sedang terjadi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center py-2 px-4 ">
                                <div class="bi bi-envelope-exclamation-fill me-3 fs-1 text-danger"></div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <h5 class="card-title">{{ $report }} Laporan</h5>
                                    <p class="card-text text-danger">Terkait Aplikasi Ini</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="card mt-3">
            <div class="card-header">
                Tentang Kami
            </div>
            <div class="card-body">
                <h5 class="card-title">Nyilih Te-lo</h5>
                <p class="card-text">adalah website yang dibangun untuk keperluan peminjaman asset logistik
                    seperti barang dan ruangan yang ada di Intitusi. Website ini dikelola oleh Staff Logistik bila ada bug
                    atau error pada website ini bisa laporkan</p>
                <a href="#" class="btn btn-primary">Hubungi Kami</a>
            </div>
        </div>




    </div>
@endsection
