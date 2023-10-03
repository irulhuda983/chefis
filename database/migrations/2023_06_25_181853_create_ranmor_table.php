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
        Schema::create('ranmor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->nullable();
            $table->string('search_by')->nullable();
            $table->integer('status')->nullable();
            $table->string('nrkb')->nullable();
            $table->string('nama_pemilik')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nik')->nullable();
            $table->string('kabkota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('merk')->nullable();
            $table->string('type')->nullable();
            $table->string('no_rangka')->nullable();
            $table->string('no_mesin')->nullable();
            $table->year('tahun')->nullable();
            $table->string('cc')->nullable();
            $table->string('bbm')->nullable();
            $table->string('jenis_kendaraan')->nullable();
            $table->string('model_kendaraan')->nullable();
            $table->string('warna')->nullable();
            $table->string('warna_tnkb')->nullable();
            $table->string('jml_roda')->nullable();
            $table->string('jml_sumbu')->nullable();
            $table->date('tgl_pkb')->nullable();
            $table->date('tgl_stnk')->nullable();
            $table->string('no_bpkb')->nullable();
            $table->string('no_stnk')->nullable();
            $table->string('no_faktur')->nullable();
            $table->date('tgl_faktur')->nullable();
            $table->string('apm')->nullable();
            $table->string('no_pib')->nullable();
            $table->string('no_sut')->nullable();
            $table->string('no_srut')->nullable();
            $table->string('no_tpt')->nullable();
            $table->string('no_form_abc')->nullable();
            $table->string('no_lelang')->nullable();
            $table->date('tgl_daftar_akhir')->nullable();
            $table->string('email')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ranmor');
    }
};
