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
        Schema::create('absen_gurus', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_jadwal')->unsigned();
            $table->foreign('id_jadwal')->references('id')->on('jadwals')->onDelete('cascade');
            $table->enum('keterangan', [
                'Hadir',
                'Penugasan',
                'Tidak Hadir'
            ]);
            $table->string('tugasmateri')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absen_gurus');
    }
};
