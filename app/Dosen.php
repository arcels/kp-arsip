<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
   protected $fillable = ['dosen_nidn', 'dosen_nama', 'dosen_email', 'dosen_jabatan', 'dosen_status', 'prodi_id'];

   public function prodi()
   {
      return $this->belongsTo('App\prodi');
   }
}
