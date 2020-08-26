<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Http\Request;

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

    public function monitor2()
    {
        return view('monitor2');
    }

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

    public function jadwal()
    {
        return view('jadwal');
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

    public function makanansimpan(Request $request)
    {
		$file = $request->file('file');
		$nama_file = $file->getClientOriginalName();
        $tujuan_upload = 'images';
        $file->move($tujuan_upload,$nama_file);
        DB::table('makanan')->insert([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
            'gambar' => $nama_file,
        ]);

        return redirect('/makanan');
    }

    public function data()
    {
        return view('data');
    }
}
