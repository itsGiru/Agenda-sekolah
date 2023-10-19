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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id();
            $table->enum('tingkat', ['10', '11', '12'])->default('10');
            $table->string('kelas');
            $table->bigInteger('id_jurusan')->index()->unsigned()->nullable();
            $table->foreign('id_jurusan')->references('id')->on('jurusans')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
