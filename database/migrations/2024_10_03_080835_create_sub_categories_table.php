<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kriteria_id');
            $table->string('nama_sub_kriteria');
            $table->string('kode_sub_kriteria'); // Contoh: "BBTB" untuk Selisih BB dan TB
            $table->float('bobot'); // Bobot subkriteria
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('kriteria_id')->references('id')->on('criterias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_categories');
    }
};
