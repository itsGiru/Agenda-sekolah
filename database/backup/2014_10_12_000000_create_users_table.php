<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal')->nullable();
            $table->text('about')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('role')->default('6')->comments('1-Admin, 2-KM, 3-Walas, 4-Kakom, 5-No role, 6-Pending');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->enum('jurusan', [
                'Pilih Jurusan',
                'Rekayasa Perangkat Lunak',
                'Tata Busana',
            ]);
        });
        Schema::table('users', function (Blueprint $table) {
            $table->enum('kelas', [
                'Pilih Jurusan Dahulu',
                'XII RPL 1',
                'XII RPL 2',
                'XII TB 1',
                'XII TB 2',

            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
