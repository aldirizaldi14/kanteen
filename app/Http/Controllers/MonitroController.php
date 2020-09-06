<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;

class MonitroController extends Controller
{
    public function monitor1()
    {
        return view('monitor1');
    }

    public function monitor2()
    {
        return view('monitor2');
    }

    // AJAX Data
    public function ajax($id) {
        $data = DB::table($id)->select('karyawan')->get();
        return Datatables::of($data)->make(true);
    }

    public function ikan($id) {

        $hex = substr(hexdec($id),0, -6);
        $part1 = "20".substr($hex,0, -4);
        $part2 = "00".substr($hex,2);
        $total = $part1.$part2;

        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $exist = DB::table('karyawan')->where('nik', $total)->count();

        if($exist == 1 ) {

            if (($now >= $a1) && ($now <= $ak1))
        {
           $shift  = 'Shift 1';
           $jadwal = date('Y-m-d').'Shift1';
           $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }
        elseif (($now >= $a2) && ($now <= $ak2)) 
        {
            $shift  = 'Shift 2';
            $jadwal = date('Y-m-d').'Shift2';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }
        elseif (($now >= $a3) && ($now <= $ak3)) 
        {
            $shift  = 'Shift 3';
            $jadwal = date('Y-m-d').'Shift13';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }
        elseif (($now >= $s1) && ($now <= $as1)) 
        {
            $shift  = 'Shift 0';
            $jadwal = date('Y-m-d').'Shift1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('snack1')->value('snack1');
        }

        $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        if (($cd1 == 1)||($cd2 == 1)||($cd3 == 1)) {
            return 1;
        }
        else {
            DB::table('device1')->insert([
                'jadwalmenu' => $jadwal,
                'karyawan' => $total,
                'shift' => $shift,
                'makanan' => $makan,
                'status' => 1,
            ]);
            return 0;
        }

        }
        else {
            return 1;
        }

    }
    public function ayam($id) { 

        $hex = substr(hexdec($id),0, -6);
        $part1 = "20".substr($hex,0, -4);
        $part2 = "00".substr($hex,2);
        $total = $part1.$part2;

        $exist = DB::table('karyawan')->where('nik', $total)->count();

        if ($exist == 1) {
            $now = date('H:i');
            $s1  = date('H:i', strtotime("06:00"));
            $as1 = date('H:i', strtotime("07:30"));
            $a1  = date('H:i', strtotime("11:00"));
            $ak1 = date('H:i', strtotime("13:15"));
            $a2  = date('H:i', strtotime("17:00"));
            $ak2 = date('H:i', strtotime("22:15"));
            $a3  = date('H:i', strtotime("02:00"));
            $ak3 = date('H:i', strtotime("03:15"));
    
            if (($now >= $a1) && ($now <= $ak1))
            {
               $shift  = 'Shift 1';
               $jadwal = date('Y-m-d').'Shift1';
               $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $a2) && ($now <= $ak2)) 
            {
                $shift  = 'Shift 2';
                $jadwal = date('Y-m-d').'Shift2';
                $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $a3) && ($now <= $ak3)) 
            {
                $shift  = 'Shift 3';
                $jadwal = date('Y-m-d').'Shift13';
                $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $s1) && ($now <= $as1)) 
            {
                $shift  = 'Shift 0';
                $jadwal = date('Y-m-d').'Shift1';
                $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('snack2')->value('snack2');
            }

            $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
            $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
            $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
            if (($cd1 == 1)||($cd2 == 1)||($cd3 == 1)) {
                return 1;
            }
            else {
                $status = 1;
                DB::table('device2')->insert([
                    'jadwalmenu' => $jadwal,
                    'karyawan' => $total,
                    'shift' => $shift,
                    'makanan' => $makan,
                    'status' => $status,
                ]);
        
                return 0;
            }
        }
        else {
            return 1;
        }
    }

    public function daging($id) {

        $hex = substr(hexdec($id),0, -6);
        $part1 = "20".substr($hex,0, -4);
        $part2 = "00".substr($hex,2);
        $total = $part1.$part2;

        $exist = DB::table('karyawan')->where('nik', $total)->count();

        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        if ($exist == 1) {

            if (($now >= $a1) && ($now <= $ak1))
        {
           $shift  = 'Shift 1';
           $jadwal = date('Y-m-d').'Shift1';
        }
        elseif (($now >= $a2) && ($now <= $ak2)) 
        {
            $shift  = 'Shift 2';
            $jadwal = date('Y-m-d').'Shift2';
        }
        elseif (($now >= $a3) && ($now <= $ak3)) 
        {
            $shift  = 'Shift 3';
            $jadwal = date('Y-m-d').'Shift3';
        }

        $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');

        $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        if (($cd1 == 1)||($cd2 == 1)||($cd3 == 1)) {
            return 1;
        }
        else {
            DB::table('device3')->insert([
                'jadwalmenu' => $jadwal,
                'karyawan' => $total,
                'shift' => $shift,
                'makanan' => $makan,
                'status' => 1,
            ]);
    
            return 0;
        }
        }
        else {
            return 1;
        }
    }
}
