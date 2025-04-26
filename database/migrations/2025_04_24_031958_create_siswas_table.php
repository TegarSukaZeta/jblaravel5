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
        Schema::create('siswas', function (Blueprint $table) {
            $table->id();
            $table->string('NIS')->unique;
            $table->string('nama_murid');
            $table->enum('jenis_kelamin', ['P','L']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->foreignId('kelas_id')->constrained();
            $table->foreignId('wali_murid_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
