<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Tunjangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return oid
     */
    public function up()
    {
        Schema::create('tunjangan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_tunjangan');
            $table->integer('jabatan_id')->unsigned();
            $table->foreign('jabatan_id')->references('id')->on('jabatan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('golongan_id')->unsigned();
            $table->foreign('golongan_id')->references('id')->on('golongan')->onDelete('cascade')->onUpdate('cascade');
            $table->string('status');
            $table->integer('jumlah_anak');
            $table->integer('besaran_uang');
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
        Schema::drop('tunjangan');
    }
}
