<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            if (!Schema::hasColumn('permohonans', 'no_siri')) {
                $table->text('no_siri')->nullable()->after('status_penempatan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('permohonans', function (Blueprint $table) {
            if (Schema::hasColumn('permohonans', 'no_siri')) {
                $table->dropColumn('no_siri');
            }
        });
    }
};