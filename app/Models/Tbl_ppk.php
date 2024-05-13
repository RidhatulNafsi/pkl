<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_ppk extends Model
{
    use HasFactory;
    protected $table='tbl_ppk';
    protected $primaryKey='id_ppk';
    protected $guarded=[];
    public $timestamps=false;
}
