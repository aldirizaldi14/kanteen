<?php

namespace App\Imports;

use App\MenuMakan;
use Maatwebsite\Excel\Concerns\ToModel;

class MenuMakanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new MenuMakan([
            //
        ]);
    }
}
