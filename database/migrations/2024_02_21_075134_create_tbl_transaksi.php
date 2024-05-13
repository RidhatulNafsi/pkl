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
        Schema::create('tbl_transaksi', function (Blueprint $table) {
            $table->id("id_transaksi");
            $table->string("no_surat_pesanan",32);
            $table->date("tgl_surat_pesanan");
            $table->foreignId('id_pekerjaan');
            $table->foreignId('id_mitra');
            $table->foreignId('id_kegiatan');
            $table->foreignId('id_sub_kegiatan');
            $table->foreignId('id_kabid');
            $table->integer("status")->length(4)->default(1);
            $table->foreignId('id_ppk')->nullable(true);
            $table->string("no_dpa",50)->nullable(true);
            $table->date("tgl_dpa")->nullable(true);
            $table->foreignId('id_pa')->nullable(true);
            $table->integer('jumlah')->length(10000000000)->nullable(true);
            //$table->string('no_rekening',20)->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_transaksi');
    }
};
