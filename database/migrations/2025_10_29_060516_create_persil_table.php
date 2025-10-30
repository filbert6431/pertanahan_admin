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
        Schema::create('persil', function (Blueprint $table) {
            $table->increments('persil_id');
            $table->string('kode_persil')->unique();

            // foreign key column
            $table->unsignedBigInteger('pemilik_warga_id'); // Pastikan ini ada

            $table->double('luas_m2');
            $table->string('penggunaan');
            $table->string('alamat_lahan');
            $table->string('rt');
            $table->string('rw');

            // constraint
            // $table->foreign('pemilik_warga_id')
            //       ->references('warga_id')
            //       ->on('warga') // Pastikan nama tabel 'warga' sesuai dengan yang ada di database
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persil');
    }
};
