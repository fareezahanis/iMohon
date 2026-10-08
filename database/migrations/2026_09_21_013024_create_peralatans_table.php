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
    Schema::create('peralatans', function (Blueprint $table) {
        $table->id();
        $table->string('nama_peralatan');
        $table->string('kategori');
        $table->string('vendor_id')->nullable(); // No. Kontrak & Vendor
        $table->integer('jumlah')->default(0);
        $table->integer('tersedia')->default(0);
        $table->integer('diagih')->default(0);
        $table->timestamps();
    });
}
};
