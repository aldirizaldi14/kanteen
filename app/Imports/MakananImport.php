<?php

namespace App\Imports;

use App\Makanan;
use Maatwebsite\Excel\Concerns\ToModel;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class MakananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        DB::table('makanan')->insert([
            'nama' => $row[0],
            'jenis' => $row[1],
            'harga' =>  $row[2],
            'gambar' => 'Dummy.jpg',
        ]);
    }
}
