@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">
            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>
            </div>
            @if (Auth::user()->level == 'admin')
                <div class="col-lg-3 col-xl-2">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.create') }}" class="btn btn-primary">Tambah Barang</a>
                    </div>
                </div>
            @endif
            @if (Auth::user()->level == 'mahasiswa')
                <div class="col-lg-3 col-xl-2">
                    <div class="d-grid gap-2">
                        <a href="{{ route('pinjam.create') }}" class="btn btn-primary">Pinjam Barang</a>
                    </div>
                </div>
            @endif
        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Kode Barang</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                        <th>Ruangan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $v)
                        <tr>
                            <td>{{ $v->id }}</td>
                            <td>{{ $v->nama_barang }}</td>
                            <td>{{ $v->stok }}</td>
                            <td>{{ $v->ruangan->nama_ruangan }}</td>
                            <td>
                                <span class="badge {{ $v->status === 'Habis' ? 'text-bg-danger' : 'text-bg-success' }}">
                                    {{ $v->status }}
                                </span>
                            </td>
                            <td>
                                @include('layouts.action')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
