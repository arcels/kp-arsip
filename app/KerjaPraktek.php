<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KerjaPraktek extends Model
{
    protected $fillable = ['id_sk','kp_hal', 'kp_perusahaan', 'kp_mahasiswa', 'kp_nim', 'kp_mulai', 'kp_selesai', 'kp_status', 'kp_download','kp_no'];
}
