<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_pa extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table='tbl_pa';
    protected $primaryKey='id_pa';
    protected $guarded=[];
    public $timestamps=false;
}
