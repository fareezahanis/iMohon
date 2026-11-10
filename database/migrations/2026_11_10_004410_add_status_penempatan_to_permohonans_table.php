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
    Schema::table('permohonans', function (Blueprint $table) {
        // Tambah kolum status_penempatan, tetapkan default null atau 'Diagih'
        $table->string('status_penempatan')->nullable()->after('status');
    });
}

public function down(): void
{
    Schema::table('permohonans', function (Blueprint $table) {
        $table->dropColumn('status_penempatan');
    });
}
};
