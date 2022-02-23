<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    protected $fillable = ['sk_kode', 'sk_title','sk_tgl','sk_penanggungjawab','sk_kepada','sk_status','sk_upload','sk_kpj'];
}
