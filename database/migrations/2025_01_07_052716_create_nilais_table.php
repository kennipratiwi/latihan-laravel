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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternatif_id');
            $table->unsignedBigInteger('sub_kriteria_id');
            $table->float('nilai'); // Nilai input dari pengguna
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('alternatif_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->foreign('sub_kriteria_id')->references('id')->on('sub_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
