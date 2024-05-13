<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_bidang extends Model
{
    use HasFactory;
    protected $table='tbl_bidang';
    protected $primaryKey='id_bidang';
    protected $guarded=[];
    public $timestamps=false;
}
