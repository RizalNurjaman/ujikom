<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MtunjanganPegawai extends Model
{
    //
    protected $table ='tunjanganPegawai';
    protected $fillable =['kode_tunjangan_id', 'pegawai_id'];
    protected $visible =['kode_tunjangan_id', 'pegawai_id'];
    public $timestamps = true;

    public function pegawai()
	    {
	    	return $this-> belongsTo('App\Mgolongan','golongan_id');	
	    }
}
