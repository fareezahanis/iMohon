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
    Schema::create('peminjamans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        $table->foreignId('peralatan_id')->nullable()->constrained('peralatans')->onDelete('cascade');
        $table->string('nama_pemohon')->nullable();
        $table->string('nama_peralatan')->nullable();
        $table->string('kategori')->nullable();
        $table->string('no_siri')->nullable();
        $table->string('lokasi')->nullable();
        $table->date('tarikh_pinjam')->nullable();
        $table->date('tarikh_pulang')->nullable();
        $table->string('status_peminjaman')->default('Dipinjam'); // Dipinjam / Telah Dikembalikan
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
