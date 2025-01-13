@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Tambah Kriteria</h1>
        <form action="{{ route('criteria.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" name="nama_kriteria"
                    value="{{ old('nama_kriteria') }}">
                @error('nama_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- <div class="mb-3">
                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                <input type="text" class="form-control @error('kode_kriteria') is-invalid @enderror" name="kode_kriteria"
                    value="{{ old('kode_kriteria') }}">
                @error('kode_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('criteria.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
