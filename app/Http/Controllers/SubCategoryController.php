<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategories = SubCategory::with('kriteria')->get();
        return view('subkriteria.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kriteria = Criteria::all(); // Untuk dropdown pilihan kriteria
        return view('subkriteria.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:criterias,id',
            'nama_sub_kriteria' => 'required|string|max:255',
            'kode_sub_kriteria' => 'required|string|max:10|unique:sub_categories',
            'bobot' => 'required|numeric|min:0|max:100',
            'target_value' => 'required|numeric',
            'temuan_qa' => 'nullable|integer|min:0', // Tambahan untuk Kriteria Disiplin
        'tinggi_badan' => 'nullable|numeric',   // Tambahan untuk Kriteria Proporsional
        'berat_badan' => 'nullable|numeric',    // Tambahan untuk Kriteria Proporsional
        ]);
         // Ambil data yang diperlukan
    $kriteriaId = $request->input('kriteria_id');
    $bobot = $request->input('bobot');
    $temuanQA = $request->input('temuan_qa', 0);
    $tinggiBadan = $request->input('tinggi_badan');
    $beratBadan = $request->input('berat_badan');
    $targetValue = 0;

    if ($kriteriaId == 2) { // Kriteria Proporsional
        if (!is_null($tinggiBadan) && !is_null($beratBadan)) {
            // GAP dasar: tinggi badan - berat badan ideal (contoh: tinggi - 100)
            $gapDasar = $tinggiBadan - 100;
    
            // Selisih aktual: gap dasar - berat badan aktual
            $gapAktual = abs($gapDasar - $beratBadan);
    
            // Konversi ke nilai proporsional atau tidak
            if ($gapAktual < 5) {
                $targetValue = 'Proporsional';
            } else {
                $targetValue = 'Tidak Proporsional';
            }
    
            // Konversi gapAktual ke poin
            if ($gapAktual >= 0 && $gapAktual <= 5) {
                $targetValue = 5;
            } elseif ($gapAktual >= 6 && $gapAktual <= 9) {
                $targetValue = 4;
            } elseif ($gapAktual >= -10 && $gapAktual <= -1) {
                $targetValue = 3;
            } elseif ($gapAktual < -10) {
                $targetValue = 2;
            } elseif ($gapAktual > 10) {
                $targetValue = 1;
            }
        }
    }    
        SubCategory::create($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Subkriteria berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $kriteria = Criteria::all();
        return view('subkriteria.edit', compact('subcategory', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kriteria_id' => 'required|exists:criterias,id',
            'nama_sub_kriteria' => 'required|string|max:255',
            'kode_sub_kriteria' => "required|string|max:10|unique:sub_categories,kode_sub_kriteria,$id",
            'bobot' => 'required|numeric|min:0|max:100',
            'target_value' => 'required|numeric',
        ]);

        $subcategory = SubCategory::findOrFail($id);
        $subcategory->update($request->all());

        return redirect()->route('subcategories.index')->with('success', 'Subkriteria berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('subcategories.index')->with('success', 'Subkriteria berhasil dihapus.');
    }
}