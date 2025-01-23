@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Kriteria</h1>
        <form action="{{ route('criteria.update', $criteria->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nama_kriteria" class="form-label">Nama Kriteria</label>
                <input type="text" class="form-control @error('nama_kriteria') is-invalid @enderror" id="nama_kriteria"
                    name="nama_kriteria" value="{{ $criteria->nama_kriteria }}" required>
                @error('nama_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="bobot_kriteria" class="form-label">Bobot Kriteria</label>
                <input type="text" class="form-control @error('bobot_kriteria') is-invalid @enderror" id="bobot_kriteria"
                    name="bobot_kriteria" value="{{ $criteria->bobot_kriteria }}" required>
                @error('bobot_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kode_kriteria" class="form-label">Kode Kriteria</label>
                <input type="text" class="form-control" id="kode_kriteria" name="kode_kriteria"
                    value="{{ $criteria->kode_kriteria }}" readonly>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('criteria.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
@endsection
