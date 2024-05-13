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
        Schema::create('tbl_sub_kegiatan', function (Blueprint $table) {
            $table->id("id_sub_kegiatan");
             $table->foreignId("id_kegiatan");
            $table->char("nama_sub_kegiatan",120);
           
    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_kegiatan');
    }
};
