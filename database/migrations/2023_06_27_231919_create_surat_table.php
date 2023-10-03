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
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->unsignedBigInteger('id_ranmor')->nullable();
            $table->string('kode')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('nrkb')->nullable();
            $table->string('tipe_nrkb')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nik')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('merk')->nullable();
            $table->string('tipe')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('model_kendaraan')->nullable();
            $table->string('tahun')->nullable();
            $table->string('cc')->nullable();
            $table->string('jml_roda')->nullable();
            $table->string('jml_sumbu')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->string('warna')->nullable();
            $table->string('bbm')->nullable();
            $table->string('warna_tnkb')->nullable();
            $table->string('tahun_registrasi')->nullable();
            $table->string('no_bpkb')->nullable();
            $table->string('no_stnk')->nullable();
            $table->string('kode_lokasi')->nullable();
            $table->string('no_urut_pendaftaran')->nullable();
            $table->string('file_srkb')->nullable();
            $table->string('file_formulir')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
