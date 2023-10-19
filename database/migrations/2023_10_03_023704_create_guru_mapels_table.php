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
        Schema::create('guru_mapels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_guru')->index()->unsigned()->nullable();
            $table->foreign('id_guru')->references('id')->on('gurus')->onDelete('cascade');
            $table->bigInteger('id_mapel')->index()->unsigned()->nullable();
            $table->foreign('id_mapel')->references('id')->on('mapels')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_mapels');
    }
};
