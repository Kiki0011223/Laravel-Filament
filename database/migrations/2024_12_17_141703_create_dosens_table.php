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
        Schema::create('dosens', function (Blueprint $table) {
            $table->id();
            $table->string('nidn', 10);
            $table->string('nama', 128);
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('email', 128);
            $table->string('no_hp', 15);
            $table->enum('jabatan_akademik', ['Dosen', 'Asisten', 'Kepala Progdi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosens');
    }
};