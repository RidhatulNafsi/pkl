<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_kabid extends Model
{
    use HasFactory;
    protected $table='tbl_kabid';
    protected $primaryKey='id_kabid';
    protected $guarded=[];
    public $timestamps=false;
}
