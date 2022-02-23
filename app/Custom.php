<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{
    protected $fillable = ['id_sk', 'c_no', 'm_isi', 'as_status'];
    
}
