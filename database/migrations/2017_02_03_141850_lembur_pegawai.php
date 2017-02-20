<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LemburPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return oid
     */
    public function up()
    {
        Schema::create('lemburPegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_lembur_id')->unsigned();
            $table->foreign('kode_lembur_id')->references('id')->on('kategoriLembur')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('jumlah_jam');
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
        Schema::drop('lemburPegawai');
    }
}
