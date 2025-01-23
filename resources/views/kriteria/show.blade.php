@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Kriteria</h1>
    <p><strong>Nama Kriteria:</strong> {{ $criteria->nama_kriteria }}</p>
    <p><strong>Kode Kriteria:</strong> {{ $criteria->kode_kriteria }}</p>
    <a href="{{ route('criteria.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection