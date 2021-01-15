<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuMakan extends Model
{
    //
    protected $fillable = [
        'id', 'tanggal', 'waktu', 'snack1', 'jsnack1', 'snack2', 'jsnack2', 'makanan1', 'banyaknya1', 'makanan2', 'banyaknya2', 'makanan3', 'banyaknya3'
    ];
}
