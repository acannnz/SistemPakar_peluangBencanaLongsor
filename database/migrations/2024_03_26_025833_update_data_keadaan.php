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
        Schema::table('data_keadaan', function (Blueprint $table) {
            $table->foreignId('kode_keadaan_id')->constrained('keadaan');
            $table->foreignId('keterangan_id')->constrained('keterangan_keadaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
