<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_rekening_sub_kegiatan extends Model
{
    use HasFactory;
    protected $table='tbl_rekening_sub_kegiatan';
    protected $primaryKey='id_sub_kegiatan';
    protected $guarded=[];
    public $timestamps=false;

    // Relasi dengan model Tbl_kegiatan
    //public function kegiatan()
    //{
       // return $this->belongsTo(Tbl_rekening_kegiatan::class,'id_kegiatan');
    //}
}
