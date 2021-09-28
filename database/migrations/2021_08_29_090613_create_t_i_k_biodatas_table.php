<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTIKBiodatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_i_k_biodatas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor');
            $table->string('nik');
            $table->string('nama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->unsignedSmallInteger('bangsa_id');
            $table->unsignedSmallInteger('kewarganegaraan_id');
            $table->string('kecamatan');
            $table->string('alamat');
            $table->string('phone');
            $table->string('pasport');
            $table->unsignedSmallInteger('agama_id');
            $table->unsignedSmallInteger('pendidikan_id');
            $table->unsignedSmallInteger('pekerjaan_id');
            $table->string('alamat_kantor');
            $table->unsignedSmallInteger('perkawinan_id');
            $table->string('legitimasi_perkawinan')->nullable();
            $table->string('tempat_perkawinan')->nullable();
            $table->date('tanggal_perkawinan')->nullable();
            $table->string('photo')->nullable();
            $table->string('riwayat_pekerjaan')->nullable();
            $table->string('riwayat_pendidikan')->nullable();
            $table->string('riwayat_kepartaian')->nullable();
            $table->string('riwayat_ormas')->nullable();
            $table->string('nama_istri')->nullable();
            $table->string('nama_anak')->nullable();
            $table->string('nama_saudara')->nullable();
            $table->string('nama_ayah_kandung')->nullable();
            $table->string('alamat_ayah_kandung')->nullable();
            $table->string('nama_ibu_kandung')->nullable();
            $table->string('alamat_ibu_kandung')->nullable();
            $table->string('nama_ayah_mertua')->nullable();
            $table->string('alamat_ayah_mertua')->nullable();
            $table->string('nama_ibu_mertua')->nullable();
            $table->string('alamat_ibu_mertua')->nullable();
            $table->string('nama_kenalan_pertama')->nullable();
            $table->string('alamat_kenalan_pertama')->nullable();
            $table->string('nama_kenalan_kedua')->nullable();
            $table->string('alamat_kenalan_kedua')->nullable();
            $table->string('nama_kenalan_ketiga')->nullable();
            $table->string('alamat_kenalan_ketiga')->nullable();
            $table->string('hobi')->nullable();
            $table->string('kedudukan')->nullable();
            $table->string('lain')->nullable();
            $table->timestamps();

            $table->foreign('bangsa_id')->references('id')->on('suku_bangsas')->onDelete('cascade');
            $table->foreign('kewarganegaraan_id')->references('id')->on('warga_negaras')->onDelete('cascade');
            $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->onDelete('cascade');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans')->onDelete('cascade');
            $table->foreign('perkawinan_id')->references('id')->on('status_perkawinans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_i_k_biodatas');
    }
}
