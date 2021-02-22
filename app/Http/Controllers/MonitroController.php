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
        return view('monitor0');
    }

    public function monitor2()
    {
        $now = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
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

    public function monitor3()
    {
                $now = date('H:i');
                $s1  = date('H:i', strtotime("05:25"));
                $as1 = date('H:i', strtotime("08:30"));
                $a1  = date('H:i', strtotime("11:00"));
                $ak1 = date('H:i', strtotime("14:15"));
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
                    $ikan = DB::table('makanan')->select('gambar')->where('nama', $sel1)->value('gambar');
                    $ayam = DB::table('makanan')->select('gambar')->where('nama', $sel2)->value('gambar');
                    $daging = DB::table('makanan')->select('gambar')->where('nama', $sel3)->value('gambar');
                    $ambil1 = DB::table('device1')->where('jadwalmenu', $date)->count();
                    $ambil2 = DB::table('device2')->where('jadwalmenu', $date)->count();
                    $ambil3 = DB::table('device3')->where('jadwalmenu', $date)->count();
                    $jum1 = DB::table('jadwalmenu')->select('banyaknya1')->where('id', $date)->value('banyaknya1') - $ambil1;
                    $jum2 = DB::table('jadwalmenu')->select('banyaknya2')->where('id', $date)->value('banyaknya2') - $ambil2;
                    $jum3 = DB::table('jadwalmenu')->select('banyaknya3')->where('id', $date)->value('banyaknya3') - $ambil3;
                    return view('monitor3', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 
                    'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, 
                    'sisikan' => $jum1, 'sisayam' => $jum2, 'sisdaging' => $jum3,
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
                    $ambil1 = DB::table('device1')->where('jadwalmenu', $date)->count();
                    $ambil2 = DB::table('device2')->where('jadwalmenu', $date)->count();
                    $ambil3 = DB::table('device3')->where('jadwalmenu', $date)->count();
                    $jum1 = DB::table('jadwalmenu')->select('banyaknya1')->where('id', $date)->value('banyaknya1') - $ambil1;
                    $jum2 = DB::table('jadwalmenu')->select('banyaknya2')->where('id', $date)->value('banyaknya2') - $ambil2;
                    $jum3 = DB::table('jadwalmenu')->select('banyaknya3')->where('id', $date)->value('banyaknya3') - $ambil3;
                    return view('monitor3', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, 
                    'sisikan' => $jum1, 'sisayam' => $jum2, 'sisdaging' => $jum3,
                    ]);
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
                    $ambil1 = DB::table('device1')->where('jadwalmenu', $date)->count();
                    $ambil2 = DB::table('device2')->where('jadwalmenu', $date)->count();
                    $ambil3 = DB::table('device3')->where('jadwalmenu', $date)->count();
                    $jum1 = DB::table('jadwalmenu')->select('banyaknya1')->where('id', $date)->value('banyaknya1') - $ambil1;
                    $jum2 = DB::table('jadwalmenu')->select('banyaknya2')->where('id', $date)->value('banyaknya2') - $ambil2;
                    $jum3 = DB::table('jadwalmenu')->select('banyaknya3')->where('id', $date)->value('banyaknya3') - $ambil3;
                    return view('monitor3', ['data1' => $sel1, 'data2' => $sel2, 'data3' => $sel3, 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => $daging, 
                    'sisikan' => $jum1, 'sisayam' => $jum2, 'sisdaging' => $jum3,
                    ]);
                }
                elseif (($now >= $s1) && ($now <= $as1)) 
                {
                    $date = date('Y-m-d').'Shift1';
                    $sel1 = DB::table('jadwalmenu')->select('snack1')->where('id', $date)->value('snack1');
                    $sel2 = DB::table('jadwalmenu')->select('snack2')->where('id', $date)->value('snack2');
                    $ikan = DB::table('makanan')->select('gambar')->where('jenis', 'sarapan')->where('nama', $sel1)->value('gambar');
                    $ayam = DB::table('makanan')->select('gambar')->where('jenis', 'sarapan')->where('nama', $sel2)->value('gambar');
                    $ambil1 = DB::table('sarapan1')->where('jadwalmenu', $date)->count();
                    $ambil2 = DB::table('sarapan2')->where('jadwalmenu', $date)->count();
                    $jum1 = DB::table('jadwalmenu')->select('jsnack1')->where('id', $date)->value('jsnack1') - $ambil1;
                    $jum2 = DB::table('jadwalmenu')->select('jsnack2')->where('id', $date)->value('jsnack2') - $ambil2;
                    return view('monitor3', ['data1' => $sel1, 'data2' => $sel2, 'data3' => '', 'ikang' => $ikan, 'ayamg' => $ayam, 'gdaging' => '',
                    'sisikan' => $jum1, 'sisayam' => $jum2, 'sisdaging' => '',
                    ]);
                }
                else {
                    return view('monitor0');
                }
    }

    // AJAX Data
    public function ajax($id) {
        $now = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));
        if (($now >= $s1) && ($now <= $as1)) {
            if ($id == 'device1') {
                $database = 'sarapan1';
                $date = date('Y-m-d').'Shift1';
            }
            elseif ($id == 'device2') {
                $database = 'sarapan2';
                $date = date('Y-m-d').'Shift1';
            } else {
                $database = 'device3';
                $date = "";
            }
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
        $data = DB::table($database)->where('jadwalmenu', $date)->join('karyawan', $database.'.karyawan', '=', 'karyawan.nik')->select('name', 'nik', $database.'.id as id')->orderBy($database.'.id', 'desc')->get();
        return Datatables::of($data)->make(true);
    }

    public function karyawanjson($id) {
        $data = DB::table('karyawan')->where('departemen', $id)->orderBy('name', 'asc')->get();
        return $data;
    }

    // =============================================
    // ================= I K A N ===================
    // =============================================

    public function ikan($id) {

        $hex   = hexdec($id);
        $temp  = DB::table('karyawan')->select('nik')->where('rfid', $hex)->value('nik');
        $ceks  = DB::table('karyawan')->select('departemen')->where('rfid', $hex)->value('departemen');

        $now  = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $database = 'device1';
            $waktu = 'shift1';
            $jadwal = date('Y-m-d').'Shift1';
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya1')->value('banyaknya1');
            $shift  = 'Shift 1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $database = 'device1';
            $waktu = 'shift2';
            $jadwal = date('Y-m-d').'Shift2';
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya1')->value('banyaknya1');
            $shift  = 'Shift 2';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $database = 'device1';
            $waktu = 'shift3';
            $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya1')->value('banyaknya1');
            $shift  = 'Shift 3';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan1')->value('makanan1');
        }elseif(($now >= $s1) && ($now <= $as1)) {
            $database = 'sarapan1';
            $waktu = 'shift0';
            $jadwal = date('Y-m-d').'Shift1';
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('jsnack1')->value('jsnack1');
            $shift  = 'Shift 0';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('snack1')->value('snack1');
        }else {
            return 1;
        }

        if(DB::table('karyawan')->where('rfid', $hex)->exists()) {
            if(($now >= $s1) && ($now <= $as1)) {
                $cd1 = DB::table('sarapan1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd2 = DB::table('sarapan2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $ctotal = $cd1 + $cd2;
            } else {
                $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $ctotal = $cd1 + $cd2 + $cd3;
            }
            $climit = DB::table('karyawan')->select('fungsi')->where('rfid', $hex)->value('fungsi');

        if ($ctotal >= $climit) {
            return 1;
        }
        else {
            DB::table($database)->insert([
                'jadwalmenu' => $jadwal,
                'karyawan' => $temp,
                'shift' => $shift,
                'makanan' => $makan,
                'status' => 1,
            ]);

        // Cek Subcont 03
        if(strpos(strtolower($ceks), 'subcont')) {
        // Do Nothing
        } else {
            DB::table('shiftkary')->where('nik', $temp)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                'status' => 1,
            ]);
        }

            $image       = DB::table('karyawan')->select('gambar')->where('nik', $temp)->value('gambar');
            $nama        = DB::table('karyawan')->select('name')->where('nik', $temp)->value('name');
            $departement = DB::table('karyawan')->select('departemen')->where('nik', $temp)->value('departemen');
            $minus       = DB::table($database)->where('jadwalmenu', $jadwal)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jikan       = $totalmakan - $minus;
            event(new IkanListener($image, $nama, $temp, $departement, 1));
            event(new TotalIkanListener($jikan, 1));
            return 0;
        }
        }
        else {
            $image       = 'Error';
            $nama        = 'Error';
            $departement = 'Error';
            $minus       = DB::table($database)->where('jadwalmenu', $jadwal)->where('shift', $shift)->where('makanan', $makan)->where('status', 1)->count();
            $jikan       = $totalmakan - $minus;
            event(new IkanListener($image, $nama, $temp, $departement, 0));
            event(new TotalIkanListener($jikan, 0));
            return 1;
        }
    }

    // =============================================
    // ================= A Y A M ===================
    // =============================================
    public function ayam($id) { 

        $hex = hexdec($id);
        $temp  = DB::table('karyawan')->select('nik')->where('rfid', $hex)->value('nik');
        $ceks  = DB::table('karyawan')->select('departemen')->where('rfid', $hex)->value('departemen');

        $now = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $waktu = 'shift1';
            $database = 'device2';
            $shift  = 'Shift 1';
            $jadwal = date('Y-m-d').'Shift1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya2')->value('banyaknya2');
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $waktu = 'shift2';
            $database = 'device2';
            $shift  = 'Shift 2';
            $jadwal = date('Y-m-d').'Shift2';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya2')->value('banyaknya2');
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $waktu = 'shift3';
            $database = 'device2';
            $shift  = 'Shift 3';
            $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift13';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan2')->value('makanan2');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya2')->value('banyaknya2');
        }elseif(($now >= $s1) && ($now <= $as1)) {
            $waktu = 'shift0';
            $database = 'sarapan2';
            $shift  = 'Shift 0';
            $jadwal = date('Y-m-d').'Shift1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('snack2')->value('snack2');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('jsnack2')->value('jsnack2');
        }else {
            return 1;
        }

        if (DB::table('karyawan')->where('rfid', $hex)->exists()) {
            if(($now >= $s1) && ($now <= $as1)) {
                $cd1 = DB::table('sarapan1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd2 = DB::table('sarapan2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $ctotal = $cd1 + $cd2;
            } else {
                $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
                $ctotal = $cd1 + $cd2 + $cd3;
            }
            $climit = DB::table('karyawan')->select('fungsi')->where('rfid', $hex)->value('fungsi');

            if ($ctotal >= $climit) {
                return 1;
            }
            else {
                DB::table($database)->insert([
                    'jadwalmenu' => $jadwal,
                    'karyawan' => $temp,
                    'shift' => $shift,
                    'makanan' => $makan,
                    'status' => 1,
                ]);
            // Cek Subcont 03
            if(strpos(strtolower($ceks), 'subcont')) {
            // Do Nothing
            } else {
                DB::table('shiftkary')->where('nik', $temp)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                    'status' => 1,
                ]);
            }
                $image       = DB::table('karyawan')->select('gambar')->where('nik', $temp)->value('gambar');
                $nama        = DB::table('karyawan')->select('name')->where('nik', $temp)->value('name');
                $departement = DB::table('karyawan')->select('departemen')->where('nik', $temp)->value('departemen');
                $minus       = DB::table($database)->where('jadwalmenu', $jadwal)->where('status', 1)->count();
                $jayam       = $totalmakan - $minus;
                event(new AyamListener($image, $nama, $temp, $departement, 1));
                event(new TotalAyamListener($jayam, 1));
                return 0;
            }
        }
        else {
            $image       = 'Error';
            $nama        = 'Error';
            $departement = 'Error';
            $minus       = DB::table($database)->where('jadwalmenu', $jadwal)->where('status', 1)->count();
            $jayam       = $totalmakan - $minus;
            event(new AyamListener($image, $nama, $temp, $departement, 0));
            event(new TotalAyamListener($jayam, 0));
            return 1;
        }
    }

    // =============================================
    // =============== D A G I N G =================
    // =============================================

    public function daging($id) {

        $hex = hexdec($id);
        $temp  = DB::table('karyawan')->select('nik')->where('rfid', $hex)->value('nik');
        $ceks  = DB::table('karyawan')->select('departemen')->where('rfid', $hex)->value('departemen');

        $now = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

        $date = date('Y-m-d'); 
        if(($now >= $a1) && ($now <= $ak1)) {
            $waktu = 'shift1';
            $shift  = 'Shift 1';
            $jadwal = date('Y-m-d').'Shift1';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan3')->value('makanan3');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya3')->value('banyaknya3');
        }elseif (($now >= $a2) && ($now <= $ak2)) {
            $waktu = 'shift2';
            $shift  = 'Shift 2';
            $jadwal = date('Y-m-d').'Shift2';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan3')->value('makanan3');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya3')->value('banyaknya3');
        }elseif (($now >= $a3) && ($now <= $ak3)) {
            $waktu = 'shift3';
            $shift  = 'Shift 3';
            $jadwal = date('Y-m-d', (strtotime ( '-1 day' ))).'Shift3';
            $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan3')->value('makanan3');
            $totalmakan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('banyaknya3')->value('banyaknya3');
        }elseif(($now >= $s1) && ($now <= $as1)) {
            return 1;
        }else {
            return 1;
        }

        if (DB::table('karyawan')->select('nik')->where('rfid', $hex)->exists()) {

        $makan  = DB::table('jadwalmenu')->where('id', $jadwal)->select('makanan3')->value('makanan3');
        if(($now >= $s1) && ($now <= $as1)) {
            $cd1 = DB::table('sarapan1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
            $cd2 = DB::table('sarapan2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
            $ctotal = $cd1 + $cd2;
        } else {
            $cd1 = DB::table('device1')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
            $cd2 = DB::table('device2')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
            $cd3 = DB::table('device3')->where('jadwalmenu', $jadwal)->where('karyawan', $temp)->where('shift', $shift)->count();
            $ctotal = $cd1 + $cd2 + $cd3;
        }
        $climit = DB::table('karyawan')->select('fungsi')->where('rfid', $hex)->value('fungsi');

        if ($ctotal >= $climit) {
            return 1;
        }
        else {
            DB::table('device3')->insert([
                'jadwalmenu' => $jadwal,
                'karyawan' => $temp,
                'shift' => $shift,
                'makanan' => $makan,
                'status' => 1,
            ]);
            // Cek Subcont 03
            if(strpos(strtolower($ceks), 'subcont')) {
                // Do Nothing
            } else {
                DB::table('shiftkary')->where('nik', $temp)->where('tanggal', $date)->where('shift', $waktu)->where('status', 0)->update([
                    'status' => 1,
                ]);
            }
            $image       = DB::table('karyawan')->select('gambar')->where('nik', $temp)->value('gambar');
            $nama        = DB::table('karyawan')->select('name')->where('nik', $temp)->value('name');
            $departement = DB::table('karyawan')->select('departemen')->where('nik', $temp)->value('departemen');
            $minus       = DB::table('device3')->where('jadwalmenu', $jadwal)->where('status', 1)->count();
            $jaging      = $totalmakan - $minus;
            event(new DagingListener($image, $nama, $temp, $departement, 1));
            event(new TotalDagingListener($jaging, 1));
            return 0;
        }
        }
        else {
            $image       = 'Error';
            $nama        = 'Error';
            $departement = 'Error';
            $minus       = DB::table('device3')->where('jadwalmenu', $jadwal)->where('status', 1)->count();
            $jaging      = $totalmakan - $minus;
            event(new DagingListener($image, $nama, $temp, $departement, 0));
            event(new TotalDagingListener($jaging, 0));
            return 1;
        }
    }

    public function select1(Request $request)
    {
        $data1 = DB::table('departement')->where('main', $request->get('departement'))->orderBy('departement', 'asc')->distinct()->pluck('departement');
        return response()->json($data1);
    }

    public function nilai($id)
    {
        return $id;
    }
}