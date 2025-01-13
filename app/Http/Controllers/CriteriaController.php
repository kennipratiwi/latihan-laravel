<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    public function index()


    {
        $kriterias = Criteria::all();
        return view('kriteria.index', compact('kriterias'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
        ]);

        // Generate kode kriteria otomatis
        $namaKriteria = $request->nama_kriteria;
        $kodeKriteria = $this->generateKodeKriteria($namaKriteria);

        // Simpan data
        Criteria::create([
            'nama_kriteria' => $namaKriteria,
            'kode_kriteria' => $kodeKriteria,
        ]);
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil ditambahkan.');
    }

    private function generateKodeKriteria($namaKriteria)
    {
        // Ambil inisial dari setiap kata di nama_kriteria
        $inisial = collect(explode(' ', $namaKriteria))
            ->map(fn($word) => strtoupper(substr($word, 0, 1)))
            ->implode('');

        // Tambahkan 3 huruf unik (acak)
        $randomStr = strtoupper(substr(md5(uniqid()), 0, 3));

        // Gabungkan inisial dan huruf unik
        return $inisial . $randomStr;
    }
}
