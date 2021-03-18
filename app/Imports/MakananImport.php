<?php

namespace App\Imports;

use App\Makanan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class MakananImport implements ToModel, SkipsOnError, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        DB::table('makanan')->updateOrInsert([
            'nama' => $row['nama']],[
            'jenis' => $row['jenis'],
            'harga' =>  $row['harga'],
            'gambar' => 'Dummy.jpg',
        ]);
    }
}
