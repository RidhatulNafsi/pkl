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
        Schema::create('tbl_ppk', function (Blueprint $table) {
            $table->id("id_ppk");
            $table->char("nama_ppk",75);
            $table->string("nip_ppk",25);
            $table->string("nomor_sk",3);
            $table->string("tahun_sk",4);
            $table->date("tanggal_terbit_sk");
            $table->enum("status_ppk",[0,1]);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_ppk');
    }
};
