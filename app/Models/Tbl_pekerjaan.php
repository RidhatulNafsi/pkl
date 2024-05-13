<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_pekerjaan extends Model
{
    use HasFactory;
    protected $table='tbl_pekerjaan';
    protected $primaryKey='id_pekerjaan';
    protected $guarded=[];
    public $timestamps=false;
}
