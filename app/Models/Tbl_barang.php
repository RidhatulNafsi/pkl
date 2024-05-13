<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_barang extends Model
{
    use HasFactory;
    protected $table='tbl_barang';
    protected $primaryKey='id_barang';
    protected $guarded=[];
    public $timestamps=false;
}
