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
        Schema::create('sengketa_persil', function (Blueprint $table) {
            $table->increments('sengketa_id');
            $table->unsignedinteger('persil_id');
            $table->string('pihak_1');
            $table->string('pihak_2');
            $table->text('kronologi')->nullable();
            $table->string('status')->default('pending')->nullable();
            $table->text('penyelesaian')->nullable();

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
        Schema::dropIfExists('sengketa_persil');
    }
};
