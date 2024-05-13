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
        Schema::create('tbl_pekerjaan', function (Blueprint $table) {
            $table->id("id_pekerjaan");
            $table->string("kode_rekening",30);
            $table->char("nama_pekerjaan",255);
            $table->char("nama_perihal",255);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pekerjaan');
    }
};
