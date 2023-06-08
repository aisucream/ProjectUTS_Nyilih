@extends('layouts.app')

@section('content')
    <div class="container-sm mt-5">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="row justify-content-center">
                <div class="p-5 bg-light rounded-3 border col-xl-6">
                    <div class="mb-3 text-center">
                        <i class="bi bi-cart-plus fs-1 text-primary"></i>
                        <h4>{{ $pageTitle }}</h4>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName" class="form-label ">Nama Barang</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="firstName" placeholder="Masukan nama barang...">
                            @error('nama')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName" class="form-label">Stok barang</label>
                            <input class="form-control @error('stok') is-invalid @enderror" type="number" name="stok"
                                id="lastName" min="1" placeholder="0">
                            @error('stok')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12 mb-3">
                            <label for="position" class="form-label">Position</label>
                            <select name="ruangan" id="position" class="form-select @error('nama') is-invalid @enderror">
                                @foreach ($db as $position)
                                    <option value="{{ $position->id }}"
                                        {{ old('position') == $position->id ? 'selected' : '' }}>
                                        {{ $position->nama_ruangan }}</option>
                                @endforeach
                            </select>
                            @error('ruangan')
                                <div class="text-danger"><small>{{ $message }}</small></div>
                            @enderror
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 d-grid">
                            <a href="{{ route('barang') }}" class="btn btn-outline-dark btn-lg mt-3"><i
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
