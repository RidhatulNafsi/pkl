<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_satuan extends Model
{
    use HasFactory;
    protected $table='tbl_satuan';
    protected $primaryKey='id_satuan';
    protected $guarded=[];
    public $timestamps=false;
}
