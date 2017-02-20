<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mgolongan extends Model
{
    //
    protected $table ='golongan';
    protected $fillable =['id','kode_golongan','nama_golongan','besaran_uang'];
    protected $visible = ['id','kode_golongan','nama_golongan','besaran_uang'];
    public $timestamps = true;

    public function kategoriLembur()
    {
    	return $this-> hasMany('App\MkategoriLembur','golongan_id');	
    }
     public function pegawai()
    {
    	return $this-> hasMany('App\Mpegawai','golongan_id');	
    }
     public function tunjangan()
    {
    	return $this-> hasMany('App\Mtunjangan','golongan_id');	
    }
}
