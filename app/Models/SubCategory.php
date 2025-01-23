<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
            'kriteria_id',
            'nama_sub_kriteria',
            'kode_sub_kriteria', // Contoh: "TBBB" untuk Selisih TB dan BB
            'bobot', // Bobot subkriteria
            'target_value', // Nilai ideal subkriteria
    ];
    protected $guarded = [];
    public function kriteria()
    {
        return $this->belongsTo(Criteria::class);
    }
}
