@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Subkriteria</h1>
    <form action="{{ route('subcategories.update', $subcategory->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kriteria_id">Kriteria</label>
            <select name="kriteria_id" id="kriteria_id" class="form-control">
                @foreach ($kriteria as $item)
                <option value="{{ $item->id }}" {{ $subcategory->kriteria_id == $item->id ? 'selected' : '' }}>
                    {{ $item->nama_kriteria }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nama_sub_kriteria">Nama Subkriteria</label>
            <input type="text" name="nama_sub_kriteria" id="nama_sub_kriteria" class="form-control" value="{{ $subcategory->nama_sub_kriteria }}">
        </div>
        <div class="form-group">
            <label for="kode_sub_kriteria">Kode Subkriteria</label>
            <input type="text" name="kode_sub_kriteria" id="kode_sub_kriteria" class="form-control" value="{{ $subcategory->kode_sub_kriteria }}">
        </div>
        <div class="form-group">
            <label for="bobot">Bobot (%)</label>
            <input type="number" name="bobot" id="bobot" class="form-control" value="{{ $subcategory->bobot }}" step="0.01">
        </div>
        <div class="form-group">
            <label for="target_value">Target Value</label>
            <input type="number" name="target_value" id="target_value" class="form-control" value="{{ $subcategory->target_value }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
