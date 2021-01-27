<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    protected $fillable = [
        'nik', 'rfid', 'name', 'departemen', 'gambar'
    ];
}
