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
        Schema::create('disposisi_surat_keluar', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sifat');
            $table->foreignId('id_surat_keluar');
            $table->foreignId('id_user_tujuan');
            $table->string('catatan');
            $table->string('lampiran');
            $table->string('status');
            $table->timestamps();

            $table->foreign('id_sifat')->references('id')->on('sifat')->onDelete('cascade');
            $table->foreign('id_surat_keluar')->references('id')->on('surat_keluar')->onDelete('cascade');
            $table->foreign('id_user_tujuan')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_surat_keluar');
    }
};
