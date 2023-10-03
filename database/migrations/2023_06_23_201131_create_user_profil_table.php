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
        Schema::create('user_profil', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('nama')->nullable();
            $table->string('nrp')->nullable();
            $table->unsignedBigInteger('id_kesatuan')->nullable();
            $table->unsignedBigInteger('id_pangkat')->nullable();
            $table->unsignedBigInteger('id_jabatan')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profil');
    }
};
