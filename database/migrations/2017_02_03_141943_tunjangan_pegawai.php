<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TunjanganPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return oid
     */
    public function up()
    {
        Schema::create('tunjanganPegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_tunjangan_id')->unsigned();
            $table->foreign('kode_tunjangan_id')->references('id')->on('tunjangan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('tunjanganPegawai');
    }
}
