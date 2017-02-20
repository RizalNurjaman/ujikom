<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MkategoriLembur extends Model
{
    //
    protected $table ='kategoriLembur';
    protected $fillable = ['kode_lembur', 'jabatan_id', 'golongan_id', 'besaran_uang'];
    protected $visible = ['kode_lembur', 'jabatan_id', 'golongan_id', 'besaran_uang'];
    public $timestamps = true;
	
	public function golongan()
	    {
	    	return $this-> belongsTo('App\Mgolongan','golongan_id');	
	    }
	public function jabatan()
	    {
	    	return $this-> belongsTo('App\Mjabatan','jabatan_id');	
	    }
	public function lemburPegawai()
	    {
	    	return $this-> hasMany('App\MlemburPegawai','kode_lembur_id');	
	    }	    
}
