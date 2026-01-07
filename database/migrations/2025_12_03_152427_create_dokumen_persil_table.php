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
        Schema::dropIfExists('dokumen_persil');

        Schema::create('dokumen_persil', function (Blueprint $table) {
            $table->id('dokumen_id');
            $table->unsignedinteger('persil_id');
            $table->string('jenis_dokumen');
            $table->string('nomor');
            $table->text('keterangan')->nullable();

            $table->foreign('persil_id')
                ->references('persil_id')
                ->on('persil')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumen_persil');
    }
};
