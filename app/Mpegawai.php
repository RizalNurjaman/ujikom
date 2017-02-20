<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpegawai extends Model
{
    //
    protected $table ='pegawai';
    protected $fillable = ['nip', 'user_id', 'jabatan_id', 'golongan_id', 'photo'];
    protected $visible = ['nip', 'user_id', 'jabatan_id', 'golongan_id', 'photo'];
    public $timestamps = true;

 public function golongan()
    {
    	return $this-> belongsTo('App\Mgolongan','golongan_id');	
    }
     public function jabatan()
    {
    	return $this-> belongsTo('App\Mjabatan','jabatan_id');	
    }
     public function tunjanganPegawai()
    {
    	return $this-> hasOne('App\MtunjanganPegawai','pegawai_id');	
    }
     public function lemburPegawai()
    {
    	return $this-> hasMany('App\MlemburPegawai','pegawai_id');	
    }
     public function users()
    {
    	return $this-> belongsTo('App\User','user_id');	
    }
}
