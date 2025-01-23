<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use COM;
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
            'bobot_kriteria' => 'required|float',
        ]);

        // Generate kode kriteria otomatis
        $namaKriteria = $request->nama_kriteria;
        $kodeKriteria = $this->generateKodeKriteria($namaKriteria);
        $bobotKriteria = $request->bobot_kriteria;

        // Simpan data
        Criteria::create([
            'nama_kriteria' => $namaKriteria,
            'kode_kriteria' => $kodeKriteria,
            'bobot_kriteria' => $bobotKriteria,
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
    public function edit($id)
    {
        // Cari data kriteria berdasarkan ID
        $criteria = Criteria::findOrFail($id);

        // Tampilkan view edit dengan data kriteria
        return view('kriteria.edit', compact('criteria'));
    }
    public function show($id)
    {
        // Cari data kriteria berdasarkan ID
        $criteria = Criteria::findOrFail($id);

        // Return view untuk menampilkan detail kriteria
        return view('kriteria.show', compact('criteria'));
    }
    public function destroy($id)
    {
        // Cari data kriteria berdasarkan ID
        $criteria = Criteria::findOrFail($id);

        // Hapus data
        $criteria->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil dihapus.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kriteria' => 'required|string|max:255',
            'bobot_kriteria' => 'required',
        ]);

        // Cari data kriteria berdasarkan ID
        $criteria = Criteria::findOrFail($id);

        // Update data
        $criteria->update([
            'nama_kriteria' => $request->nama_kriteria,
            'kode_kriteria' => $request->kode_kriteria,
            'bobot_kriteria' => $request->bobot_kriteria,
        ]);

        return redirect()->route('criteria.index')->with('success', 'Kriteria berhasil diperbarui.');
    }
}
