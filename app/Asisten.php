<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asisten extends Model
{
   protected $fillable = ['id_sk', 'as_nama','as_nim','as_prodi','as_makul','as_kelas','as_semester','as_tahun','as_status','as_no'];
    
}
