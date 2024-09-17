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
        Schema::create('pengumpulan_penugasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penugasan_id');
            $table->string('link_google_drive');
            $table->unsignedBigInteger('user_id');
            $table->string('catatan');
            $table->enum('status', ['revisi', 'selesai', 'baru'])->default('baru');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('penugasan_id')->references('id')->on('penugasan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengumpulan_penugasan');
    }
};
