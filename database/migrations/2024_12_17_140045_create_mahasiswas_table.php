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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 13);
            $table->string('nama', 128);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('alamat', 128);
            $table->date('tanggal_lahir');
            $table->enum('jurusan', ['Teknik Informatika', 'Sistem Informasi', 'Pariwisata']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};