<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function dashboard()
    {
        $date = date('Y-m-d');
        $today1 = DB::table('jadwalmenu')->where('tanggal', $date)->where('waktu', 'Shift1')->get();
        $today2 = DB::table('jadwalmenu')->where('tanggal', $date)->where('waktu', 'Shift2')->get();
        $today3 = DB::table('jadwalmenu')->where('tanggal', $date)->where('waktu', 'Shift3')->get();
        return view('dashboard', ['data1' => $today1, 'data2' => $today2, 'data3' => $today3]);
    }

    // ==================================
    // Departement ======================
    // Urusan Departemen dilakukan disini
    // Disini batasnya ya. ==============
    // ==================================

    public function departement() {
        $data = DB::table('departement')->get();
        return view('departement', ['data' => $data]);
    }

    public function deptplus() {
        $data1 = DB::table('departement')->select('main')->distinct()->get();
        $data2 = DB::table('departement')->select('departement')->distinct()->get();
        return view('departement.plus', ['list1' => $data1, 'list2' => $data2]);
    }

    public function deptminus($id)
    {
        DB::table('departement')->where('id', $id)->delete();
        return redirect('/departement');
    }

    public function deptsave(Request $request) {
        DB::table('departement')->insert([
            'main' => $request->main,
            'departement' => $request->nama,
            'costcenter' => $request->costcenter,
        ]);
        return redirect('/departement');
    }

    public function deptalter($id) {
        $data0 = DB::table('departement')->where('id', $id)->get();
        $data1 = DB::table('departement')->select('main')->distinct()->get();
        $data2 = DB::table('departement')->select('departement')->distinct()->get();
        return view('departement.alter', ['data' => $data0, 'list1' => $data1, 'list2' => $data2]);
    }

    public function deptalters(Request $request) {
        DB::table('departement')->where('id', $request->id)->update([
            'main' => $request->main,
            'departemen' => $request->nama,
            'costcenter' => $request->costcenter,
        ]);
        return redirect('/departement');
    }

    // Untuk Karyawan
    // Semua Urusan Karyawan bagian yang ini menangangi 

    public function karyawan()
    {
        $data = DB::table('karyawan')->get();
        return view('karyawan', ['data' => $data, 'i' => 1]);
    }

    public function karyawanalter($id)
    {
        $data0 = DB::table('karyawan')->where('nik', $id)->get();
        $data1 = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
        return view('karyawan.alter', ['data' => $data0, 'dept' => $data1]);
    }

    public function karyawanalters(Request $request)
    {
        $iname = DB::table('karyawan')->select('gambar')->where('id', $request->id)->value('gambar');
        if ($request->hasFile('file')) {
            File::delete('kimages/' . $iname);
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'kimages';
            $file->move($tujuan_upload, $nama_file);

            DB::table('karyawan')->where('id', $request->id)->update([
                'nik' => $request->nik,
                'name' => $request->nama,
                'departemen' => $request->departemen,
                'remark' => $request->remark,
                'gambar' => $nama_file,
            ]);
        } else {
            DB::table('karyawan')->where('id', $request->id)->update([
                'nik' => $request->nik,
                'name' => $request->nama,
                'departemen' => $request->departemen,
                'remark' => $request->remark,
            ]);
        }
        return redirect('/karyawan');
    }

    public function karyawanplus()
    {
        $data = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
        return view('karyawan.plus', ['dept' => $data]);
    }

    public function karyawanminus($id)
    {
        $data = DB::table('karyawan')->where('nik', $id)->delete();
        return redirect('/karyawan');
    }

    public function karyawansimpan(Request $request)
    {
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'kimages';
        $file->move($tujuan_upload, $nama_file);
        DB::table('karyawan')->insert([
            'nik' => $request->nik,
            'name' => $request->nama,
            'departemen' => $request->departemen,
            'remark' => $request->remark,
            'gambar' => $nama_file,
        ]);
        return redirect('/karyawan');
    }

    // ===================================================
    // Untuk Pengaturan Jadwal ===========================
    // Tebelin Dikit biar keren ==========================
    // Segala sesuatu yang mengurus penjadwalan ada disini
    // ===================================================
    public function jadwal()
    {
        $data = DB::table('jadwalmenu')->get();
        return view('jadwal', ['data' => $data]);
    }

    public function jadwalalter($id)
    {
        $data = DB::table('jadwalmenu')->where('id', $id)->get();
        $data1 = DB::table('makanan')->where('jenis', 'Sarapan')->get();
        $data2 = DB::table('makanan')->where('jenis', 'Ikan')->get();
        $data3 = DB::table('makanan')->where('jenis', 'Ayam')->get();
        $data4 = DB::table('makanan')->where('jenis', 'Daging')->get();
        DB::table('jadwalmenu')->where('id', $id)->get();
        return view('jadwal.alter', ['data' => $data, 'snack' => $data1, 'ikan' => $data2, 'ayam' => $data3, 'daging' => $data4]);
    }

    public function jadwalminus($id)
    {
        $data = DB::table('jadwalmenu')->where('id', $id)->delete();
        return redirect('jadwal');
    }

    public function jadwalplus()
    {
        $union = DB::table('makanan')->where('jenis', 'Spesial');
        $data1 = DB::table('makanan')->where('jenis', 'Sarapan')->get();
        $data2 = DB::table('makanan')->where('jenis', 'Ikan')->union($union)->get();
        $data3 = DB::table('makanan')->where('jenis', 'Ayam')->union($union)->get();
        $data4 = DB::table('makanan')->where('jenis', 'Daging')->union($union)->get();
        return view('jadwal.plus', ['snack' => $data1, 'ikan' => $data2, 'ayam' => $data3, 'daging' => $data4]);
    }

    public function jadwalalters(Request $request)
    {
        if($request->waktu == 'Shift1') {
            $jsnack1 = $request->jsnack1;
            $jsnack2 = $request->jsnack2;
            $snack1 = $request->snack1;
            $snack2 = $request->snack2;
        }
        else {
            $jsnack1 = 0;
            $jsnack2 = 0;
            $snack1 = '-';
            $snack2 = '-';
        }
        $id = $request->tanggal . $request->waktu;
        DB::table('jadwalmenu')->where('id', $request->id)->update([
            'id' => $id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'snack1' => $snack1,
            'jsnack1' => $jsnack1,
            'snack2' => $snack2,
            'jsnack2' => $jsnack2,
            'makanan1' => $request->makanan1,
            'banyaknya1' => $request->banyaknya1,
            'makanan2' => $request->makanan2,
            'banyaknya2' => $request->banyaknya2,
            'makanan3' => $request->makanan3,
            'banyaknya3' => $request->banyaknya3,
        ]);
        return redirect('/jadwal');
    }

    public function jadwalsimpan(Request $request)
    {
        if($request->waktu == 'Shift1') {
            $jsnack1 = $request->jsnack1;
            $jsnack2 = $request->jsnack2;
            $snack1 = $request->snack1;
            $snack2 = $request->snack2;
        }
        else {
            $jsnack1 = 0;
            $jsnack2 = 0;
            $snack1 = '-';
            $snack2 = '-';
        }
        $id = $request->tanggal . $request->waktu;
        DB::table('jadwalmenu')->insert([
            'id' => $id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'snack1' => $snack1,
            'jsnack1' => $jsnack1,
            'snack2' => $snack2,
            'jsnack2' => $jsnack2,
            'makanan1' => $request->makanan1,
            'banyaknya1' => $request->banyaknya1,
            'makanan2' => $request->makanan2,
            'banyaknya2' => $request->banyaknya2,
            'makanan3' => $request->makanan3,
            'banyaknya3' => $request->banyaknya3,
        ]);
        return redirect('/jadwal');
    }

    // ======================================================
    // Untuk Makanan ========================================
    // Tebelin Sedikit Biar Keren ===========================
    // Disini Tempat Mengurus semua keperluan backend makanan
    // ======================================================
    public function makanan()
    {
        $data = DB::table('makanan')
        ->leftJoin('sarapan1', 'makanan.nama' , '=', 'sarapan1.makanan')
        ->leftJoin('sarapan2', 'makanan.nama' , '=', 'sarapan2.makanan')
        ->leftJoin('device1', 'makanan.nama' , '=', 'device1.makanan')
        ->leftJoin('device2', 'makanan.nama' , '=', 'device2.makanan')
        ->leftJoin('device3', 'makanan.nama' , '=', 'device3.makanan')
        ->select( 'idm', 'nama', 'jenis', 'harga', 'gambar',
            DB::raw("count(sarapan1.makanan) as aa"),
            DB::raw("count(sarapan2.makanan) as bb"),
            DB::raw('count(device1.makanan) as cc'),
            DB::raw('count(device2.makanan) as dd'),
            DB::raw('count(device3.makanan) as ee'),
        )->groupBy('makanan.idm', 'makanan.nama', 'makanan.jenis', 'makanan.harga', 'makanan.gambar')->get();
        return view('makanan', ['data' => $data]);
        // return $data;
    }

    public function makananplus()
    {
        return view('makanan.plus');
    }

    public function makananalter($id)
    {
        $data = DB::table('makanan')->where('idm', $id)->get();
        return view('makanan.alter', ['data' => $data]);
    }

    public function makanansimpan(Request $request)
    {
        $file = $request->file('file');
        $nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'fimages';
        $file->move($tujuan_upload, $nama_file);
        DB::table('makanan')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $nama_file,
        ]);

        return redirect('/makanan');
    }

    public function makananminus($id)
    {
        $iname = DB::table('makanan')->select('gambar')->where('idm', $id)->value('gambar');
        File::delete('fimages/' . $iname);
        DB::table('makanan')->where('idm', $id)->delete();
        return redirect('makanan');
    }

    public function makananalters(Request $request)
    {
        $iname = DB::table('makanan')->select('gambar')->where('idm', $request->id)->value('gambar');
        if ($request->hasFile('file')) {
            File::delete('fimages/' . $iname);
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'fimages';
            $file->move($tujuan_upload, $nama_file);

            DB::table('makanan')->where('idm', $request->id)->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'gambar' => $nama_file,
            ]);
        } else {
            DB::table('makanan')->where('idm', $request->id)->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
            ]);
        }
        return redirect('/makanan');
    }

    // ====================================
    // +++++++++++++ D A T A ++++++++++++++
    // + Segala Keperluan Data Ada Disini +
    // ====================================

    public function data()
    {
        $data = DB::table('jadwalmenu')
        ->leftJoin('sarapan1', 'jadwalmenu.id' , '=', 'sarapan1.jadwalmenu')
        ->leftJoin('sarapan2', 'jadwalmenu.id' , '=', 'sarapan2.jadwalmenu')
        ->leftJoin('device1', 'jadwalmenu.id' , '=', 'device1.jadwalmenu')
        ->leftJoin('device2', 'jadwalmenu.id' , '=', 'device2.jadwalmenu')
        ->leftJoin('device3', 'jadwalmenu.id' , '=', 'device3.jadwalmenu')
        ->select('jadwalmenu.tanggal', 'jadwalmenu.waktu',
            DB::raw("count(sarapan1.karyawan) as sarapan1_count"),
            DB::raw("count(sarapan2.karyawan) as sarapan2_count"),
            DB::raw('count(device1.karyawan) as device1_count'),
            DB::raw('count(device2.karyawan) as device2_count'),
            DB::raw('count(device3.karyawan) as device3_count'),
        )->groupBy('jadwalmenu.tanggal', 'jadwalmenu.waktu')
        ->get();
        return view('data', ['data' => $data]);
    }

    public function dataid($id)
    {
        $data = DB::table('datadepartement')
        ->join('departement', 'datadepartement.departement', '=', 'departement.departement')
        ->where('tanggal', $id)->get();
        return view('dataid', ['data' => $data]);
    }

    public function datamakan()
    {
        $awal = DB::table('datadepartement')->select('tanggal')->distinct()->get();
        $a = array();
        $b = array();
        $c = array();
        $d = array();
        $e = array();
        $f = array();
        foreach ($awal as $aw) {
            $col1 = DB::table('datadepartement')->select('tanggal')->where('tanggal', $aw->tanggal)->distinct()->value('tanggal');
            $col2 = DB::table('datadepartement')->where('tanggal', $aw->tanggal)->sum('shift1');
            $col3 = DB::table('datadepartement')->where('tanggal', $aw->tanggal)->sum('longshift1');
            $col4 = DB::table('datadepartement')->where('tanggal', $aw->tanggal)->sum('shift2');
            $col5 = DB::table('datadepartement')->where('tanggal', $aw->tanggal)->sum('longshift2');
            $col6 = DB::table('datadepartement')->where('tanggal', $aw->tanggal)->sum('shift3');
            array_push($a, $col1);
            array_push($b, $col2);
            array_push($c, $col3);
            array_push($d, $col4);
            array_push($e, $col5);
            array_push($f, $col6);
        }
        $collection = collect([$a, $b, $c, $d, $e, $f])->transpose()->toArray();
        return view('datamakan', ['union' => $collection]);
    }

    public function detaildatam($id) {
        $sarapan1 = DB::table('sarapan1')->where('jadwalmenu', $id)->join('karyawan', 'sarapan1.karyawan', '=', 'karyawan.nik')->get();
        $sarapan2 = DB::table('sarapan2')->where('jadwalmenu', $id)->join('karyawan', 'sarapan2.karyawan', '=', 'karyawan.nik')->get();
        $device1 = DB::table('device1')->where('jadwalmenu', $id)->join('karyawan', 'device1.karyawan', '=', 'karyawan.nik')->get();
        $device2 = DB::table('device2')->where('jadwalmenu', $id)->join('karyawan', 'device2.karyawan', '=', 'karyawan.nik')->get();
        $device3 = DB::table('device3')->where('jadwalmenu', $id)->join('karyawan', 'device3.karyawan', '=', 'karyawan.nik')->get();
        $data = DB::table('jadwalmenu')->where('id', $id)->get();
        return view('detaildatam', ['data' => $data ,'data1' => $sarapan1, 'data2' => $sarapan2, 'data3' => $device1, 'data4' => $device2, 'data5' => $device3,]);

    }
}
