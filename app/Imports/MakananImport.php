<?php

namespace App\Imports;

use App\Makanan;
use Maatwebsite\Excel\Concerns\ToModel;

class MakananImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Makanan([
            //
        ]);
    }
}
