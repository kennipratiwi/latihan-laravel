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
        Schema::table('sub_categories', function (Blueprint $table) {
             // Tambahkan kolom untuk tinggi badan
             $table->float('tinggi_badan')->nullable()->after('bobot');
    
            // Tambahkan kolom untuk berat badan
            $table->float('berat_badan')->nullable()->after('tinggi_badan');
    
            // Tambahkan kolom untuk temuan QAtable->integer('temuan_qa')->nullable()->after('berat_badan');

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sub_categories', function (Blueprint $table) {
             // Drop kolom yang telah ditambahkan
             $table->dropColumn('tinggi_badan');
             $table->dropColumn('berat_badan');$table->dropColumn('temuan_qa');

        });
    }
};
