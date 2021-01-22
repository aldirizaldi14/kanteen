<?php

namespace App\Imports;

use App\DataShift;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsErrors;

class DataShiftImport implements ToModel, SkipsOnError
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    use Importable, SkipsErrors;
    public function model(array $row, $i=0)
    {
        $hari = date('l', strtotime($row[9]));
        if ($hari == 'Monday') {
            $h = 0;
        } elseif ($hari == 'Tuesday'){
            $h = 1;
        } elseif ($hari == 'Wednesday'){
            $h = 2;
        } elseif ($hari == 'Thursday'){
            $h = 3;
        } else {
            $h = 4;
        }

        while ($h<5) {
            if ($row[8] == 'Non Shift' || $row[8] == 'Shift 1') {
                DB::table('shiftkary')->insert([
                    'id' => 'U0'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift0',
                    'status' => 0,
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'U1'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift1',
                    'status' => 0,
                ]);
            }
            if ($row[8] == 'Long Shift 1') {
                DB::table('shiftkary')->insert([
                    'id' => 'U0'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift0',
                    'status' => 0,
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'U1'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift1',
                    'status' => 0,
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'U2'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift2',
                    'status' => 0,
                ]);
            }
            if ($row[8] == 'Long Shift 2') {
                DB::table('shiftkary')->insert([
                    'id' => 'U2'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift2',
                    'status' => 0,
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'U3'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift3',
                    'status' => 0,
                ]);
            }
            if ($row[8] == 'Shift 2') {
                DB::table('shiftkary')->insert([
                    'id' => 'U2'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift2',
                    'status' => 0,
                ]);
            }
            if ($row[8] == 'Shift 3') {
                DB::table('shiftkary')->insert([
                    'id' => 'U3'.date('Ymd', strtotime($row[9])).$row[1].$i,
                    'id_data' => $row[3],
                    'tanggal' => date('Y-m-d', strtotime($row[9].'+'.$h.'days')),
                    'nik' =>  $row[1],
                    'shift' => 'shift3',
                    'status' => 0,
                ]);
            }
            $i++;
            $h++;
        }
    
        }
        }
