<?php

namespace App\Imports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        DB::table('karyawan')->insert([
            'nik' => $row[0],
            'rfid' => $row[1],
            'name' =>  $row[2],
            'departement' => $row[3],
            'gambar' => 'Dummy.jpg',
        ]);
    }
}
