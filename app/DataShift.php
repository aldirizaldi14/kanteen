<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataShift extends Model
{
    //
    protected $fillable = [
        'id', 'id_data', 'tanggal', 'nik', 'shift', 'status',
    ];
}
