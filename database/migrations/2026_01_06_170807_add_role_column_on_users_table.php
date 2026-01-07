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
    Schema::table('users', function (Blueprint $table) {
        Schema::create('user', function (Blueprint $table) {
        $table->increments('user_id');
        $table->string('name');
        $table->string('email')->unique();
        $table->string('password');
        $table->string('status')->default('aktif');
        $table->string('role')->after('password');
        $table->timestamps();
    });
    $table->string('role')->after('password');
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::table('users', function (Blueprint $table) {
    $table->dropColumn('role');
});
    }
};
