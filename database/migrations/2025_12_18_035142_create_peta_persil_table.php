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
        Schema::create('peta_persil', function (Blueprint $table) {
            $table->increments('peta_id');
            $table->unsignedinteger('persil_id');
            $table->string('geojson');
            $table->unsignedinteger('panjang_m');
            $table->unsignedinteger('lebar_m');

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
        Schema::dropIfExists('peta_persil');
    }
};
