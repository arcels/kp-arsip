<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Prodi extends Model
{
   protected $fillable = ['prodi_kode', 'prodi_nama','prodi_status'];

}
