<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_mitra extends Model
{
    use HasFactory;
    protected $table='tbl_mitra';
    protected $primaryKey='id_mitra';
    protected $guarded=[];
    public $timestamps=false;
}
