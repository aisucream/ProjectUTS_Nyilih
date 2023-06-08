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
                        <th>Nama</th>
                        <th>Jenis Laporan</th>
                        <th>Keterangan</th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $report)
                        <tr>
                            <td>{{ $report->user->name }}</td>
                            <td>{{ $report->jenis_report }}</td>
                            <td>{{ $report->keterangan }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
