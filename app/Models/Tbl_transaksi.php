<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tbl_Transaksi extends Model
{
    use HasFactory;
    protected $table='tbl_transaksi';
    protected $primaryKey='id_transaksi';
    protected $guarded=[];
    public $timestamps=false;
   /// protected $fillable = ['jumlah', 'no_rekening', 'id_pa'];

    public function pekerjaan(){
        return $this->belongsTo(Tbl_pekerjaan::class,'id_pekerjaan');
    }
    public function satuan(){
        return $this->belongsTo(Tbl_satuan::class,'id_satuan');
    }
    public function barang(){
        return $this->belongsTo(Tbl_satuan::class,'id_barang');
    }
    public function bidang(){
        return $this->belongsTo(Tbl_bidang::class,'id_bidang');
    }

    public function mitra(){
        return $this->belongsTo(Tbl_mitra::class,'id_mitra');
    }
    public function kegiatan(){
        return $this->belongsTo(Tbl_kegiatan::class,'id_kegiatan');
    }
    public function sub_kegiatan(){
        return $this->belongsTo(Tbl_sub_kegiatan::class,'id_sub_kegiatan');
    }
    public function kabid(){
        return $this->belongsTo(Tbl_kabid::class,'id_kabid');
    }
    public function ppk(){
        return $this->belongsTo(Tbl_ppk::class,'id_ppk');
    }  

    public function pembelian() {
            return $this->hasMany(Tbl_pembelian::class,'id_transaksi');
     }
    
    public function pa(){
        return $this->belongsTo(Tbl_pa::class,'id_pa');
    }
}


