<?php

namespace App\Http\Controllers;

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
    public function dashboard()
    {
        return view('dashboard');
    }
    public function karyawan()
    {
        return view('karyawan');
    }
    public function jadwal()
    {
        return view('jadwal');
    }
    public function makanan()
    {
        return view('makanan');
    }
    public function data()
    {
        return view('data');
    }
}
