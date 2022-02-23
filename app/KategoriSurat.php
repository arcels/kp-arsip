<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriSurat extends Model
{
   protected $fillable = ['ks_kode', 'ks_keterangan', 'ks_status'];
    
}
