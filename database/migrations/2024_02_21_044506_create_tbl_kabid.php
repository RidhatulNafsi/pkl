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
        Schema::create('tbl_kabid', function (Blueprint $table) {
            $table->id("id_kabid");
            $table->char("nama_kabid",30);
            $table->string("nip_kabid",18);
            $table->string("bidang_kabid",110);
            $table->enum("status_kabid",[0,1]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kabid');
    }
};
