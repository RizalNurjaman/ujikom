<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpenggajian extends Model
{
    //
    protected $table ='penggajian';
    protected $fillable = ['tunjangan_pegawai_id', 'jumlah_jam_lembur', 'jumlah_uang_lembur', 'gaji_pokok', 'total_gaji', 'tanggal_pengambilan', 'status_pengambilan'];
    protected $visible = ['tunjangan_pegawai_id', 'jumlah_jam_lembur', 'jumlah_uang_lembur', 'gaji_pokok', 'total_gaji', 'tanggal_pengambilan', 'status_pengambilan'];
    public $timestamps = true;

 public function tunjanganPegawai()
    {
    	return $this-> belongsTo('App\MtunjanganPegawai','tunjangan_pegawai_id');	
    }
     
}
