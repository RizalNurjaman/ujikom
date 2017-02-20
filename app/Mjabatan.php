<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mjabatan extends Model
{
    //
    protected $table ='jabatan';
    protected $fillable = ['kode_jabatan', 'nama_jabatan', 'besaran_uang'];
    protected $visible = ['kode_jabatan', 'nama_jabatan', 'besaran_uang'];
    public $timestamps = true;

	 public function kategoriLembur()
	 {
	 	return $this-> hasMany('App\MkategoriLembur','jabatan_id');	
	 }
	 public function pegawai()
    {
    	return $this-> hasMany('App\Mpegawai','jabatan_id');	
    }
     public function tunjangan()
    {
    	return $this-> hasMany('App\Mtunjangan','jabatan_id');	
    }	    
}
