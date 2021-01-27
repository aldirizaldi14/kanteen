<?php

namespace App\Imports;

use App\MenuMakan;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class MenuMakanImport implements ToModel, SkipsOnError, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row)
    {
        if ($row['shift'] == 'Shift1') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Y-m-d', strtotime($row['tanggal'])).$row['shift'],
                'tanggal' => $row['tanggal'],
                'waktu' =>  $row['shift'],
                'snack1' => $row['snack_1'],
                'jsnack1' => $row['jumlah_snack_1'],
                'snack2' => $row['snack_2'],
                'jsnack2' => $row['jumlah_snack_2'],
                'makanan1' => $row['menu_ikan'],
                'banyaknya1' => $row['jumlah_menu_ikan'],
                'makanan2' => $row['menu_ayam'],
                'banyaknya2' => $row['jumlah_menu_ayam'],
                'makanan3' => $row['menu_daging'],
                'banyaknya3' => $row['jumlah_menu_daging'],
            ]);
        }
        elseif ($row['shift'] == 'Shift2') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Y-m-d', strtotime($row['tanggal'])).$row['shift'],
                'tanggal' => $row['tanggal'],
                'waktu' =>  $row['shift'],
                'snack1' => '-',
                'jsnack1' => 0,
                'snack2' => '-',
                'jsnack2' => 0,
                'makanan1' => $row['menu_ikan'],
                'banyaknya1' => $row['jumlah_menu_ikan'],
                'makanan2' => $row['menu_ayam'],
                'banyaknya2' => $row['jumlah_menu_ayam'],
                'makanan3' => $row['menu_daging'],
                'banyaknya3' => $row['jumlah_menu_daging'],
            ]);
        }
        elseif ($row['shift'] == 'Shift3') {
            DB::table('jadwalmenu')->insert([
                'id' => date('Y-m-d', strtotime($row['tanggal'])).$row['shift'],
                'tanggal' => $row['tanggal'],
                'waktu' =>  $row['shift'],
                'snack1' => '-',
                'jsnack1' => 0,
                'snack2' => '-',
                'jsnack2' => 0,
                'makanan1' => $row['menu_ikan'],
                'banyaknya1' => $row['jumlah_menu_ikan'],
                'makanan2' => $row['menu_ayam'],
                'banyaknya2' => $row['jumlah_menu_ayam'],
                'makanan3' => $row['menu_daging'],
                'banyaknya3' => $row['jumlah_menu_daging'],
            ]);
        }
    }
    }
