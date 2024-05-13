<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_sub_kegiatan extends Model
{
    use HasFactory;
    protected $table='tbl_sub_kegiatan';
    protected $primaryKey='id_sub_kegiatan';
    protected $fillable=['id_kegiatan', 'nama_sub_kegiatan'];
    public $timestamps=false;

    // Relasi dengan model Tbl_kegiatan
    public function kegiatan()
    {
        return $this->belongsTo(Tbl_kegiatan::class,'id_kegiatan');
    }
}
