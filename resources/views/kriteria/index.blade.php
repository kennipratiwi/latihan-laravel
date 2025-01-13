@extends('layouts.master')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Criteria</h1>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary" onclick="window.location.href='{{ route('criteria.create') }}'">Add</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kode Kriteria</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kriteria->nama_kriteria }}</td>
                                    <td>{{ $kriteria->kode_kriteria }}</td>
                                    <td>
                                        <a href="{{ route('criteria.show', $kriteria->id) }}"
                                            class="btn btn-info btn-sm">Detail</a>
                                        <a href="{{ route('criteria.edit', $kriteria->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('criteria.destroy', $kriteria->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Hapus kriteria ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
