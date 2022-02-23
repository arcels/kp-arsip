<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skaktif extends Model
{
    protected $fillable = ['id_sk', 'm_no','m_mahasiswa','m_nim','m_prodi','m_keperluan','m_alamat','m_tahun','m_status'];

}
