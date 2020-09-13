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
        return view('karyawan', ['data' => $data]);
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
            'golongan' => $request->golongan,
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
        $data1 = DB::table('makanan')->where('jenis', 'Sarapan')->get();
        $data2 = DB::table('makanan')->where('jenis', 'Ikan')->get();
        $data3 = DB::table('makanan')->where('jenis', 'Ayam')->get();
        $data4 = DB::table('makanan')->where('jenis', 'Daging')->get();
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
        $data = DB::table('makanan')->get();
        return view('makanan', ['data' => $data]);
    }

    public function makananplus()
    {
        return view('makanan.plus');
    }

    public function makananalter($id)
    {
        $data = DB::table('makanan')->where('id', $id)->get();
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
        $iname = DB::table('makanan')->select('gambar')->where('id', $id)->value('gambar');
        File::delete('fimages/' . $iname);
        DB::table('makanan')->where('id', $id)->delete();
        return redirect('makanan');
    }

    public function makananalters(Request $request)
    {
        $iname = DB::table('makanan')->select('gambar')->where('id', $request->id)->value('gambar');
        if ($request->hasFile('file')) {
            File::delete('fimages/' . $iname);
            $file = $request->file('file');
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'fimages';
            $file->move($tujuan_upload, $nama_file);

            DB::table('makanan')->where('id', $request->id)->update([
                'nama' => $request->nama,
                'jenis' => $request->jenis,
                'harga' => $request->harga,
                'gambar' => $nama_file,
            ]);
        } else {
            DB::table('makanan')->where('id', $request->id)->update([
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
        $tanggal = date('Y-m-d');
        $data1 = DB::table('device1')->get();
        $data2 = DB::table('device2')->union($data1)->get();
        $data3 = DB::table('device3')->union($data2)->get();
        return view('data', ['data' => $data]);
    }

    public function dataid($id)
    {
        return view('dataid');
    }

    public function datamakan()
    {

        return view('datamakan');
    }
}
