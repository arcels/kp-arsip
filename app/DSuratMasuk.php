<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DSuratMasuk extends Model
{
    protected $fillable = ['sm_id', 'sm_dosen','sm_upload'];
    protected $primaryKey = "id";
    
}
