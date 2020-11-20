<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Events\BroadcastListener;
use App\Events\AyamListener;
use App\Events\IkanListener;
use App\Events\DagingListener;
use App\Events\TotalAyamListener;
use App\Events\TotalDagingListener;
use App\Events\TotalIkanListener;
use DataTables;

class MonitroController extends Controller
{
    public function monitor1()
    {
        // $now = date('H:i');
        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        if (($now >= $a1) && ($now <= $ak1))
        {
            $date = date('Y-m-d').'Shift1';
            $sel1 = DB::table('jadwalmenu')->select('makanan1')->where('id', $date)->value('makanan1');
            $sel2 = DB::table('jadwalmenu')->select('makanan2')->where('id', $date)->value('makanan2');
            $sel3 = DB::table('jadwalmenu')->select('makanan3')->where('id', $date)->value('makanan3');
            $ikan = DB::table('makanan')->select('gambar')->where('jenis', 'ikan')->where('nama', $sel1)->value('gambar');
            $ayam = DB::table('makanan')->select('gambar')->where('jenis', 'ayam')->where('nama', $sel2)->value('gambar');
            $daging = DB::table('makanan')->select('gambar')->where('jenis', 'daging')->where('nama', $sel3)->value('gambar');
            return view('monitor1', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 
            'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, 
            
            ]);
        }
        elseif (($now >= $a2) && ($now <= $ak2)) 
        {
            $date = date('Y-m-d').'Shift2';
            $sel1 = DB::table('jadwalmenu')->select('makanan1')->where('id', $date)->value('makanan1');
            $sel2 = DB::table('jadwalmenu')->select('makanan2')->where('id', $date)->value('makanan2');
            $sel3 = DB::table('jadwalmenu')->select('makanan3')->where('id', $date)->value('makanan3');
            $ikan = DB::table('makanan')->select('gambar')->where('jenis', 'ikan')->where('nama', $sel1)->value('gambar');
            $ayam = DB::table('makanan')->select('gambar')->where('jenis', 'ayam')->where('nama', $sel2)->value('gambar');
            $daging = DB::table('makanan')->select('gambar')->where('jenis', 'daging')->where('nama', $sel3)->value('gambar');
            return view('monitor1', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, ]);
        }
        elseif (($now >= $a3) && ($now <= $ak3)) 
        {
            $date = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift3';
            $sel1 = DB::table('jadwalmenu')->select('makanan1')->where('id', $date)->value('makanan1');
            $sel2 = DB::table('jadwalmenu')->select('makanan2')->where('id', $date)->value('makanan2');
            $sel3 = DB::table('jadwalmenu')->select('makanan3')->where('id', $date)->value('makanan3');
            $ikan = DB::table('makanan')->select('gambar')->where('jenis', 'ikan')->where('nama', $sel1)->value('gambar');
            $ayam = DB::table('makanan')->select('gambar')->where('jenis', 'ayam')->where('nama', $sel2)->value('gambar');
            $daging = DB::table('makanan')->select('gambar')->where('jenis', 'daging')->where('nama', $sel3)->value('gambar');
            return view('monitor1', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, ]);
        }
        elseif (($now >= $s1) && ($now <= $as1)) 
        {
            $date = date('Y-m-d').'Shift1';
            $sel1 = DB::table('jadwalmenu')->select('snack1')->where('id', $date)->value('snack1');
            $sel2 = DB::table('jadwalmenu')->select('snack2')->where('id', $date)->value('snack2');
            $ikan = DB::table('makanan')->select('gambar')->where('jenis', 'sarapan')->where('nama', $sel1)->value('gambar');
            $ayam = DB::table('makanan')->select('gambar')->where('jenis', 'sarapan')->where('nama', $sel2)->value('gambar');
            return view('monitor1', ['data1' => $sel1, 'data2' => $sel2, 'data3' => '', 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => '']);
        }
        else {
            return view('monitor0');
        }
    }

    public function monitor2()
    {
        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));
        if ((($now >= $a1) && ($now <= $ak1)) || (($now >= $a2) && ($now <= $ak2)) || (($now >= $a3) && ($now <= $ak3)) || (($now >= $s1) && ($now <= $as1)) )
                {
                    return view('monitor2');
                }
                else {
                    return view('monitor0');
                }
    }

    // AJAX Data
    public function ajax($id) {
        $now = date('H:i');
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));
        if ($id == 'device1') {
            $database = 'sarapan1';
            $date = date('Y-m-d').'Shift1';
        }
        elseif ($id == 'device2') {
            $database = 'sarapan2';
            $date = date('Y-m-d').'Shift1';
        } 
        else {
            $database = $id;
                if (($now >= $a1) && ($now <= $ak1))
                {
                    $date = date('Y-m-d').'Shift1';
                }
                elseif (($now >= $a2) && ($now <= $ak2)) 
                {
                    $date = date('Y-m-d').'Shift2';
                    
                }
                elseif (($now >= $a3) && ($now <= $ak3)) 
                {
                    $date = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift3';
                }
                else {
                    $date = "";
                }
        }
        $data = DB::table($database)->where('jadwalmenu', $date)->join('karyawan', $database.'.karyawan', '=', 'karyawan.nik')->select('name', 'nik')->get();
        return Datatables::of($data)->make(true);
    }

    public function karyawanjson($id) {
        $data = DB::table('karyawan')->where('departemen', $id)->orderBy('name', 'asc')->get();
        return $data;
    }

        // AJAX Data
    public function count($id, $param1) {
        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        if (($now >= $a1) && ($now <= $ak1))
        {
           $jadwal = date('Y-m-d').'Shift1';
           $shift = 'Shift 1';
        }
        elseif (($now >= $a2) && ($now <= $ak2)) 
        {
            $jadwal = date('Y-m-d').'Shift2';
            $shift = 'Shift 2';
            
        }
        elseif (($now >= $a3) && ($now <= $ak3)) 
        {
            $jadwal = date('Y-m-d').'Shift3';
            $shift = 'Shift 3';
        }
        elseif (($now >= $s1) && ($now <= $as1)) 
        {
            $jadwal = date('Y-m-d').'Shift1';
            $shift = 'Shift 0';
        }
        else {
            $jadwal = "";
            $shift = "";
        }
            $data = DB::table($id)->where('id', $jadwal)->where('shift', $shift)->count();
            return $data;
    }

    // =============================================
    // ================= I K A N ===================
    // =============================================

    public function ikan($id) {

        $hex = substr(hexdec($id),0, -6);
        $part1 = substr($hex,0, -4);
        $part2 = substr($hex,2);
        $total = $part1.$part2;

        $now  = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $waktu = 'shift1';
            $inv = 'device1';
            $wow = date('Y-m-d').'Shift1';
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $waktu = 'shift2';
            $inv = 'device1';
            $wow = date('Y-m-d').'Shift2';
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $waktu = 'shift3';
            $inv = 'device1';
            $wow = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
        }elseif(($now >= $s1) && ($now <= $as1)) {
            $waktu = 'shift0';
            $inv = 'sarapan1';
            $wow = date('Y-m-d').'Shift1';
        }else {
            $waktu = 'nono';
        }

        $exist = DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->count();

        if($exist == 1 ) {

            if (($now >= $a1) && ($now <= $ak1))
        {
           $database = 'device1';
           $shift  = 'Shift 1';
           $jadwal = date('Y-m-d').'Shift1';
           $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
           $total  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('banyaknya1');
        }
        elseif (($now >= $a2) && ($now <= $ak2)) 
        {
            $database = 'device1';
            $shift  = 'Shift 2';
            $jadwal = date('Y-m-d').'Shift2';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
            $total  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('banyaknya2');
        }
        elseif (($now >= $a3) && ($now <= $ak3)) 
        {
            $database = 'device1';
            $shift  = 'Shift 3';
            $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
            $total  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('banyaknya3');
        }
        elseif (($now >= $s1) && ($now <= $as1)) 
        {
            $database = 'sarapan1';
            $shift  = 'Shift 0';
            $jadwal = date('Y-m-d').'Shift1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('snack1')->value('snack1');
            $total  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('jsnack1');
        }

        $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $total)->where('shift', $shift)->count();
        if (($cd1 == 1)||($cd2 == 1)||($cd3 == 1)) {
            return 1;
        }
        else {
            DB::table($database)->insert([
                'jadwalmenu' => $jadwal,
                'karyawan' => $total,
                'shift' => $shift,
                'makanan' => $makan,
                'status' => 1,
            ]);
            DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                'status' => 1,
            ]);
            $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
            $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
            $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
            $minus       = DB::table($database)->where('jadwalmenu', $jadwal)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jikan       = $total - $minus;
            event(new IkanListener($image, $nama, $total, 1));
            event(new TotalIkanListener($jikan));
            return 0;
        }

        }
        else {
            $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
            $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
            $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
            $minus       = DB::table($inv)->where('jadwalmenu', $wow)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jikan       = $total - $minus;
            event(new IkanListener($image, $nama, $nik, 0));
            event(new TotalIkanListener($jikan));
            return 1;
        }

    }

    // =============================================
    // ================= A Y A M ===================
    // =============================================
    public function ayam($id) { 

        $hex = substr(hexdec($id),0, -6);
        $part1 = substr($hex,0, -4);
        $part2 = substr($hex,2);
        $total = $part1.$part2;

        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $waktu = 'shift1';
            $inv = 'device2';
            $wow = date('Y-m-d').'Shift1';
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $waktu = 'shift2';
            $inv = 'device2';
            $wow = date('Y-m-d').'Shift2';
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $waktu = 'shift3';
            $inv = 'device2';
            $wow = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
        }elseif(($now >= $s1) && ($now <= $as1)) {
            $waktu = 'shift0';
            $inv = 'sarapan2';
            $wow = date('Y-m-d').'Shift1';
        }else {
            $waktu = 'nono';
        }

        $exist = DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->count();

        if ($exist == 1) {
    
            if (($now >= $a1) && ($now <= $ak1))
            {
               $database = 'device2';
               $shift  = 'Shift 1';
               $jadwal = date('Y-m-d').'Shift1';
               $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $a2) && ($now <= $ak2)) 
            {
                $database = 'device2';
                $shift  = 'Shift 2';
                $jadwal = date('Y-m-d').'Shift2';
                $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $a3) && ($now <= $ak3)) 
            {
                $database = 'device2';
                $shift  = 'Shift 3';
                $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
                $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            }
            elseif (($now >= $s1) && ($now <= $as1)) 
            {
                $database = 'sarapan2';
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
                DB::table($database)->insert([
                    'jadwalmenu' => $jadwal,
                    'karyawan' => $total,
                    'shift' => $shift,
                    'makanan' => $makan,
                    'status' => 1,
                ]);
                DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                    'status' => 1,
                ]);
                $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
                $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
                $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
                $minus       = DB::table($database)->where('jadwalmenu', $wow)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
                $jayam       = $total - $minus;
                event(new AyamListener($image, $nama, $total, 1));
                event(new TotalAyamListener($jayam));
                return 0;
            }
        }
        else {
            $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
            $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
            $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
            $minus       = DB::table($inv)->where('jadwalmenu', $wow)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jayam       = $total - $minus;
            event(new AyamListener($image, $nama, $total, 0));
            event(new TotalAyamListener($jayam));
            return 1;
        }
    }

    // =============================================
    // =============== D A G I N G =================
    // =============================================

    public function daging($id) {

        $hex = substr(hexdec($id),0, -6);
        $part1 = substr($hex,0, -4);
        $part2 = substr($hex,2);
        $total = $part1.$part2;

        $now = date('H:i');
        $s1  = date('H:i', strtotime("06:00"));
        $as1 = date('H:i', strtotime("07:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("13:20"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $waktu = 'shift1';
            $wow = date('Y-m-d').'Shift1';
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $waktu = 'shift2';
            $wow = date('Y-m-d').'Shift2';
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $waktu = 'shift3';
            $wow = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift3';
        }elseif(($now >= $s1) && ($now <= $as1)) {
            $waktu = 'shift0';
        }else {
            $waktu = 'nono';
        }

        $exist = DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->count();

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
            $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift3';
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
            DB::table('shiftkary')->where('nik', $total)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                'status' => 1,
            ]);
            $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
            $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
            $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
            $minus       = DB::table('device3')->where('jadwalmenu', $jadwal)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jaging       = $total - $minus;
            event(new DagingListener($image, $nama, $total, 1));
            event(new TotalDagingListener($jaging));
            return 0;
        }
        }
        else {
            $image       = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('gambar');
            $nama        = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('name');
            $departement = DB::table('karyawan')->select('gambar', 'name', 'departemen')->where('nik', $total)->value('departemen');
            $minus       = DB::table('device3')->where('jadwalmenu', $wow)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jaging       = $total - $minus;
            event(new DagingListener($image, $nama, $total, 0));
            event(new TotalDagingListener($jaging));
            return 1;
        }
    }

    public function monitor3() {
        return view('monitor3');
    }

    public function test($nik) {
        event(new BroadcastListener($nik));
        return "Event has been sent!";
    }
}