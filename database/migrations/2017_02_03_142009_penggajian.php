<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Penggajian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return oid
     */
    public function up()
    {
        Schema::create('penggajian', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tunjangan_pegawai_id')->unsigned();
            $table->foreign('tunjangan_pegawai_id')->references('id')->on('tunjanganPegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_jam_lembur');
            $table->integer('jumlah_uang_lembur');
            $table->integer('gaji_pokok');
            $table->integer('total_gaji');
            $table->date('tanggal_pengambilan');
            $table->boolean('status_pengambilan');
            $table->string('petugas_penerima');
            $table->timestamps();
        });
    }

    /**
     * Reerse the migrations.
     *
     * @return oid
     */
    public function down()
    {
        Schema::drop('penggajian');
    }
}
