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
        Schema::create('tbl_mitra', function (Blueprint $table) {
            $table->id("id_mitra");
            $table->char("nama_perusahaan",35);
            $table->text("alamat_perusahaan");
            $table->char("nama_perwakilan",30);
            $table->char("jabatan_perwakilan",30);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mitra');
    }
};
