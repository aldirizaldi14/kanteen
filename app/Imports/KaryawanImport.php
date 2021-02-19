<?php

namespace App\Imports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;


class KaryawanImport implements ToModel, SkipsOnError, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        DB::table('karyawan')->updateOrInsert([
            'nik' => $row['emp_id'],
            'rfid' => $row['rfid'],
            'name' =>  $row['name'],
            'departemen' => $row['dept'],
            'gambar' => 'Dummy.jpg',
            'fungsi' => $row['fungsi'],
        ]);
    }
}
