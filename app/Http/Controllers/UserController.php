<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function settingshift() {
        $data = DB::table('karyawan')->select('departemen', 'remark')->get();
        return view('settingshift', ['dept' => $data]);
    }

    public function settingsimpan(Request $request) {
        DB::table('DataDepartement')->insert([
            'tanggal' => $request->tanggal,
            'departement' => $request->departement,
            'remark' => $request->remark,
            'shift1' => $request->jshift1,
            'longshift1' => $request->jlshift1,
            'shift2' => $request->jshift2,
            'longshift2' => $request->jlshift2,
            'shift3' => $request->jshift3,
        ]);
        return redirect('/data/makanan');
    }
}
