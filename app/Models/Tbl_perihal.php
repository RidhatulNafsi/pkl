<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_perihal extends Model
{
    use HasFactory;
    protected $table='tbl_perihal';
    protected $primaryKey='id_perihal';
    protected $guarded=[];
    public $timestamps=false;
}
