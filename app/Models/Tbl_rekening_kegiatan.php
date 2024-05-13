<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use App\Models\Tbl_rekening_sub_kegiatan;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tbl_rekening_kegiatan extends Model
{
    use HasFactory;
    
    protected $table = 'tbl_rekening_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $guarded = [];
    public $timestamps = false;

    // Relationship with Tbl_rekening_sub_kegiatan model
    //public function subKegiatan()
    //{
       // return $this->hasMany(Tbl_rekening_sub_kegiatan::class, 'id_kegiatan');
    //}
}

