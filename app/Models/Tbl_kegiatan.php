<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_kegiatan extends Model
{
    use HasFactory;
    protected $table='tbl_kegiatan';
    protected $primaryKey='id_kegiatan';
    protected $fillable=['id_kegiatan', 'nama_kegiatan'];
    public $timestamps=false;

    //Relasi dengan moel Tbl_sub_kegiatan
    public function subKegiatan()
    {
        return $this->belongsTo(Tbl_sub_kegiatan::class,'id_kegiatan');
    }
}
