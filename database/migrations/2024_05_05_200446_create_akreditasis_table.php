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
        Schema::create('akreditasi', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama_prodi');
            $table->string('peringkat');
            $table->string('akreditasi_nas');
            $table->date('tgl_exp_akreditasi_nas');
            $table->string('akreditasi_inter')->nullable();
            $table->date('tgl_exp_akreditasi_inter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akreditasis');
    }
};
