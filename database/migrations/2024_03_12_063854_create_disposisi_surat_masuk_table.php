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
        Schema::create('disposisi_surat_masuk', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_sifat');
            $table->foreignId('id_surat_masuk');
            $table->string('email_tujuan');
            $table->string('catatan');
            $table->string('lampiran');
            $table->string('status');
            $table->string('email_pengarsip');
            $table->timestamps();

            $table->foreign('id_sifat')->references('id')->on('sifat')->onDelete('cascade');
            $table->foreign('id_surat_masuk')->references('id')->on('surat_masuk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisi_surat_masuk');
    }
};
