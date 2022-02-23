<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
   protected $fillable = ['sm_keterangan', 'sm_tgl','sm_kode'];
   protected $primaryKey = "id";

    
}
