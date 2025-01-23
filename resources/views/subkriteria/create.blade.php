@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Tambah Subkriteria</div>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
        <form action="{{ route('subcategories.store') }}" method="POST">
            @csrf
            <!-- Kriteria ID -->
            <div class="mb-3">
                <label for="kriteria_id" class="form-label">Kriteria</label>
                <select id="kriteria_id" name="kriteria_id" class="form-control @error('kriteria_id') is-invalid @enderror">
                    <option value="">Pilih Kriteria</option>
                    @foreach ($kriteria as $kriteria)
                        <option value="{{ $kriteria->id }}">{{ $kriteria->nama_kriteria }}</option>
                    @endforeach
                </select>
                @error('kriteria_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama Subkriteria -->
            <div class="mb-3">
                <label for="nama_sub_kriteria" class="form-label">Nama Subkriteria</label>
                <input type="text" id="nama_sub_kriteria" name="nama_sub_kriteria" class="form-control @error('nama_sub_kriteria') is-invalid @enderror" value="{{ old('nama_sub_kriteria') }}">
                @error('nama_sub_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            <!-- Kode Subkriteria -->
            <div class="mb-3">
                <label for="kode_sub_kriteria" class="form-label">Kode Subkriteria</label>
                <input type="text" id="kode_sub_kriteria" name="kode_sub_kriteria" class="form-control @error('kode_sub_kriteria') is-invalid @enderror" value="{{ old('kode_sub_kriteria') }}">
                @error('kode_sub_kriteria')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>
            <!-- Bobot -->
            <div class="mb-3">
                <label for="bobot" class="form-label">Bobot (%)</label>
                <input type="number" id="bobot" name="bobot" class="form-control @error('bobot') is-invalid @enderror" value="{{ old('bobot') }}" step="0.01" min="0" max="100">
                @error('bobot')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

            </div>

                        <!-- Tinggi Badan dan Berat Badan (Kriteria Proporsional) -->
                        <div class="mb-3">
                            <label for="tinggi_badan" class="form-label">Tinggi Badan (cm) <small>(untuk Kriteria Proporsional)</small></label>
                            <input type="number" id="tinggi_badan" name="tinggi_badan" class="form-control @error('tinggi_badan') is-invalid @enderror" value="{{ old('tinggi_badan') }}">
                            @error('tinggi_badan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="berat_badan" class="form-label">Berat Badan (kg) <small>(untuk Kriteria Proporsional)</small></label>
                            <input type="number" id="berat_badan" name="berat_badan" class="form-control @error('berat_badan') is-invalid @enderror" value="{{ old('berat_badan') }}">
                            @error('berat_badan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Temuan QA (Kriteria Disiplin) -->
                        <div class="mb-3">
                            <label for="temuan_qa" class="form-label">Jumlah Temuan QA <small>(untuk Kriteria Disiplin)</small></label>
                            <input type="number" id="temuan_qa" name="temuan_qa" class="form-control @error('temuan_qa') is-invalid @enderror" value="{{ old('temuan_qa') }}" min="0">
                            @error('temuan_qa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
