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
    Schema::create('permohonans', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');
        $table->string('id_permohonan')->unique(); 
        $table->string('jenis_permohonan');
        $table->string('nama_item'); 
        $table->string('kuantiti')->nullable();
        $table->date('tarikh_mohon');
        $table->text('tujuan');
        $table->string('nama_penerima');
        $table->string('lokasi');
        $table->string('status')->default('Dalam proses');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permohonans');
    }
};
