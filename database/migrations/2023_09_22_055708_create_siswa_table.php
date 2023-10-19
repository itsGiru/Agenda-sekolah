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
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_kelas')->index()->unsigned();
            $table->foreign('id_kelas')->references('id')->on('kelas')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama');
            $table->integer('no_absen');
            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan',
                'Undefined'
            ])->default('Undefined');
            $table->bigInteger('lulus')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswa');
    }
};
