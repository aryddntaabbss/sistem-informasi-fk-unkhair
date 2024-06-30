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
        Schema::create('kerjasama_dn', function (Blueprint $table) {
            $table->id();
            $table->string('kerjasama');
            $table->string('mitra');
            $table->string('kegiatan');
            $table->string('ketua_tim');
            $table->string('departemen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama_d_n_s');
    }
};
