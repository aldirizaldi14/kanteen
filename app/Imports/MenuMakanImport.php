<?php

namespace App\Imports;

use App\MenuMakan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class MenuMakanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        if ($row[1] == 'Shift1') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Ymd', strtotime($row[0])).$row[1],
                'tanggal' => $row[0],
                'waktu' =>  $row[1],
                'snack1' => $row[2],
                'jsnack1' => $row[3],
                'snack2' => $row[4],
                'jsnack2' => $row[5],
                'makanan1' => $row[6],
                'banyaknya1' => $row[7],
                'makanan2' => $row[8],
                'banyaknya2' => $row[9],
                'makanan3' => $row[10],
                'banyaknya3' => $row[11],
            ]);
        }
        elseif ($row[1] == 'Shift2') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Ymd', strtotime($row[0])).$row[1],
                'tanggal' => $row[0],
                'waktu' =>  $row[1],
                'snack1' => '-',
                'jsnack1' => 0,
                'snack2' => '-',
                'jsnack2' => 0,
                'makanan1' => $row[6],
                'banyaknya1' => $row[7],
                'makanan2' => $row[8],
                'banyaknya2' => $row[9],
                'makanan3' => $row[10],
                'banyaknya3' => $row[11],
            ]);
        }
        elseif ($row[1] == 'Shift3') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Ymd', strtotime($row[0])).$row[1],
                'tanggal' => $row[0],
                'waktu' =>  $row[1],
                'snack1' => '-',
                'jsnack1' => 0,
                'snack2' => '-',
                'jsnack2' => 0,
                'makanan1' => $row[6],
                'banyaknya1' => $row[7],
                'makanan2' => $row[8],
                'banyaknya2' => $row[9],
                'makanan3' => $row[10],
                'banyaknya3' => $row[11],
            ]);
        }
    }
    }
