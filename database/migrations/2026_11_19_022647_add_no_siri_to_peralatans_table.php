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
    Schema::table('peralatans', function (Blueprint $table) {
        if (!Schema::hasColumn('peralatans', 'no_siri')) {
            $table->longText('no_siri')->nullable()->after('nama_peralatan');
        }
    });
}

public function down(): void
{
    Schema::table('peralatans', function (Blueprint $table) {
        $table->dropColumn('no_siri');
    });
}
};