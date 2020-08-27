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
        return view('dashboard');
    }
    public function karyawan()
    {
        $data = DB::table('karyawan')->get();
        return view('karyawan', ['data' => $data]);
    }

    public function karyawanplus()
    {
        return view('karyawan.plus');
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

    public function jadwalplus()
    {
        $data1 = DB::table('makanan')->where('jenis', 'Snack')->get();
        $data2 = DB::table('makanan')->where('jenis', 'Ikan')->get();
        $data3 = DB::table('makanan')->where('jenis', 'Ayam')->get();
        $data4 = DB::table('makanan')->where('jenis', 'Daging')->get();
        return view('jadwal.plus', ['snack' => $data1, 'ikan' => $data2, 'ayam' => $data3, 'daging' => $data4]);
    }

    public function jadwalsimpan(Request $request)
    {
        DB::table('jadwalmenu')->insert([
            'tanggal' => $request->nama,
            'waktu' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $nama_file,
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
        File::delete('fimages/'.$iname);
        DB::table('makanan')->where('id', $id)->delete();
        return redirect('makanan');
    }

    public function makananalters(Request $request)
    {
        $iname = DB::table('makanan')->select('gambar')->where('id', $request->id)->value('gambar');
        if ($request->hasFile('file')) {
            File::delete('fimages/'.$iname);
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
