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


    public function karyawan()
    {
        $data = DB::table('karyawan')->get();
        return view('karyawan', ['data' => $data]);
    }

    public function karyawanalter($id)
    {
        $data = DB::table('karyawan')->where('nik', $id)->get();
        return view('karyawan.alter', ['data' => $data]);
    }

    public function karyawanalters(Request $request)
    {
        DB::table('karyawan')->where('id', $request->id)->update([
            'nik' => $request->nik,
            'name' => $request->nama,
            'departemen' => $request->departemen,
            'golongan' => $request->golongan,
            'shift' => $request->shift,
        ]);
        return redirect('/karyawan');
    }

    public function karyawanplus()
    {
        return view('karyawan.plus');
    }

    public function karyawanminus($id)
    {
        $data = DB::table('karyawan')->where('nik', $id)->delete();
        return redirect('/karyawan');
    }

    public function karyawansimpan(Request $request)
    {
        DB::table('karyawan')->insert([
            'nik' => $request->nik,
            'name' => $request->nama,
            'golongan' => $request->golongan,
            'departemen' => $request->departemen,
            'shift' => $request->shift,
        ]);
        return redirect('/karyawan');
    }

    // Untuk Pengaturan Jadwal
    // Tebelin Dikit buar keren
    // Segala sesuatu yang mengurus penjadwalan ada disini
    public function jadwal()
    {
        $data = DB::table('jadwalmenu')->get();
        return view('jadwal', ['data' => $data]);
    }

    public function jadwalalter($id)
    {
        $data = DB::table('jadwalmenu')->where('id', $id)->get();
        $data1 = DB::table('makanan')->where('jenis', 'Snack')->get();
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
        $data1 = DB::table('makanan')->where('jenis', 'Snack')->get();
        $data2 = DB::table('makanan')->where('jenis', 'Ikan')->get();
        $data3 = DB::table('makanan')->where('jenis', 'Ayam')->get();
        $data4 = DB::table('makanan')->where('jenis', 'Daging')->get();
        return view('jadwal.plus', ['snack' => $data1, 'ikan' => $data2, 'ayam' => $data3, 'daging' => $data4]);
    }

    public function jadwalalters(Request $request)
    {
        $id = $request->tanggal . $request->waktu;
        DB::table('jadwalmenu')->where('id', $request->id)->update([
            'id' => $id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'snack1' => $request->snack1,
            'jsnack1' => $request->jsnack1,
            'snack2' => $request->snack2,
            'jsnack2' => $request->jsnack2,
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
        $id = $request->tanggal . $request->waktu;
        DB::table('jadwalmenu')->insert([
            'id' => $id,
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'snack1' => $request->snack1,
            'jsnack1' => $request->jsnack1,
            'snack2' => $request->snack2,
            'jsnack2' => $request->jsnack2,
            'makanan1' => $request->makanan1,
            'banyaknya1' => $request->banyaknya1,
            'makanan2' => $request->makanan2,
            'banyaknya2' => $request->banyaknya2,
            'makanan3' => $request->makanan3,
            'banyaknya3' => $request->banyaknya3,
        ]);
        return redirect('/jadwal');
    }

    // Untuk Makanan
    // Tebelin Sedikit Biar Keren
    // Disini Tempat Mengurus semua keperluan backend makanan
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

    public function data()
    {
        return view('data');
    }
}
