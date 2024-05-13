<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tbl_pembelian extends Model
{
    use HasFactory;
    protected $table='tbl_pembelian';
    protected $primaryKey='id_pembelian';
    protected $fillable=['id_transaksi','id_barang','id_satuan','jumlah'];
    public $timestamps=false;

    public function barang()
    {
        return $this->belongsTo(Tbl_barang::class, 'id_barang');

    }
    public function satuan()
    {
        return $this->belongsTo(Tbl_satuan::class,'id_satuan');
    }

}
