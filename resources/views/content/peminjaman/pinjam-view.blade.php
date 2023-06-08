@extends('layouts.app')
@section('content')
    <div class="container mt-4">
        <div class="row mb-0">

            <div class="col-lg-9 col-xl-10">
                <h4 class="mb-3">{{ $pageTitle }}</h4>

            </div>

        </div>
        <hr>
        <div class="table-responsive border p-3 rounded-3">
            <table class="table table-bordered table-hover table-striped mb-0 bg-white">
                <thead>
                    <tr>
                        <th>Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Pinjam</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $v)
                        <tr>

                            <td>{{ $v->barang->nama_barang }}</td>
                            <td>{{ $v->jumlah_barang }}</td>
                            <td>{{ $v->created_at }}</td>


                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-2 col-xl-2">
            <a href="{{ route('pinjam.index') }}" class="btn btn-outline-dark mt-3"><i class="bi-arrow-left-circle me-2"></i>
                Back</a>
        </div>
    </div>
@endsection
