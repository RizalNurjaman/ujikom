<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MlemburPegawai extends Model
{
    //
    protected $table ='lemburPegawai';
    protected $fillable = ['kode_lembur_id', 'pegawai_id', 'jumlah_jam'];
    protected $visible = ['kode_lembur_id', 'pegawai_id', 'jumlah_jam'];
    public $timestamps = true;

	public function pegawai()
	    {
	    	return $this-> belongsTo('App\Mpegawai','pegawai_id');	
	    }
	public function kategoriLembur()
	    {
	    	return $this-> belongsTo('App\MkategoriLembur','kode_lembur_id');	
	    }
}
