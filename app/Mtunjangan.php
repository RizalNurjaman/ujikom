<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mtunjangan extends Model
{
    //
    protected $table ='tunjangan';
    protected $fillable = ['kode_tunjangan', 'jabatan_id', 'golongan_id', 'status', 'jumlah_anak', 'besaran_uang'];
    protected $visible = ['kode_tunjangan', 'jabatan_id', 'golongan_id', 'status', 'jumlah_anak', 'besaran_uang'];
    public $timestamps = true;

	 public function golongan()
	    {
	    	return $this-> belongsTo('App\Mgolongan','golongan_id');	
	    }
	 public function tunjanganPegawai()
	    {
	    	return $this-> hasMany('App\MtunjanganPegawai','kode_tunjangan');	
	    }
}
