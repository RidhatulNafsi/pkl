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
        Schema::create('tbl_pembelian', function (Blueprint $table) {
            $table->id("id_pembelian");
            $table->foreignId('id_transaksi');
            $table->foreignId('id_barang');
            $table->foreignId("id_satuan",25);
            $table->integer("jumlah")->length(100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pembelian');
    }
};
