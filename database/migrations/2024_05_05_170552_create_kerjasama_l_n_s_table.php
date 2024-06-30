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
        Schema::create('kerjasama_ln', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('partner');
            $table->string('faculty');
            $table->bigInteger('start');
            $table->bigInteger('end');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kerjasama_l_n_s');
    }
};
