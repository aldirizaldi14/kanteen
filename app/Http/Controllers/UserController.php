<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Auth;
Use Redirect;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function datashift()
    {
        $data = DB::table('datadepartement')->orderBy('tanggal', 'desc')->get();
        return view('datashift', ['data' => $data]);
    }

    public function detailshift($id){
        $shift1 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift1')->get();
        $shift2 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'longshift1')->get();
        $shift3 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift2')->get();
        $shift4 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'longshift2')->get();
        $shift5 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift3')->get();
        $alldat = DB::table('datadepartement')->where('id', $id)->get();
        return view('shiftdetail', ['data' => $alldat, 'data1' => $shift1, 'data2' => $shift2, 'data3' => $shift3, 'data4' => $shift4, 'data5' => $shift5]);
    }

    public function settingshift()
    {
        $ada  = DB::table('datadepartement')->where('status', 0)->value('id');
        $data = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
        return view('settingshift', ['dept' => $data]);
    }

    public function settinggo($id)
    {
        $sele1 = DB::table('datadepartement')->select('departement')->where('id', $id)->value('departement');
        $data0 = DB::table('datadepartement')->where('id', $id)->get();
        $data1 = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
        $data2 = DB::table('karyawan')->where('departemen', $sele1)->orderBy('name', 'asc')->get();
        return view('settingshiftgo', ['data' => $data0, 'dept' => $data1, 'kary' => $data2]);
    }

    public function settinggoes(Request $request)
    {
        if ($request->tombol == 'Rubah') {
            DB::table('datadepartement')->where('id', $request->id)->update([
                'tanggal' => $request->tanggal,
                'departement' => $request->departement,
                'remark' => $request->remark,
                'shift1' => $request->jshift1,
                'longshift1' => $request->jlshift1,
                'shift2' => $request->jshift2,
                'longshift2' => $request->jlshift2,
                'shift3' => $request->jshift3,
                'status' => 1,
            ]);
            return redirect('/settingshift/go/' . $request->id);
        } else {
            
            // Shift 1
            if (isset($request->shift1)) {
                for ($count = 0; $count < count($request->shift1); $count++) {
                    DB::table('shiftkary')->insert([
                        'id' => date('Ymd', strtotime($request->tanggal)).$count . 'shift1',
                        'tanggal' => $request->tanggal,
                        'nik' =>  $request->shift1[$count],
                        'shift' => 'shift1',
                    ]);
                }
            }
            // LongShift 1
            if (isset($request->longshift1)) {
                for ($count = 0; $count < count($request->longshift1); $count++) {
                    DB::table('shiftkary')->insert([
                        'id' => date('Ymd', strtotime($request->tanggal)).$count  . 'longshift1',
                        'tanggal' => $request->tanggal,
                        'nik' =>  $request->longshift1[$count],
                        'shift' => 'longshift1',
                    ]);
                }
            }
            // Shift 2
            if (isset($request->shift2)) {
                for ($count = 0; $count < count($request->shift2); $count++) {
                    DB::table('shiftkary')->insert([
                        'id' => date('Ymd', strtotime($request->tanggal)).$count  . 'shift2',
                        'tanggal' => $request->tanggal,
                        'nik' =>  $request->shift2[$count],
                        'shift' => 'shift2',
                    ]);
                }
            }
            // Long Shift 2
            if (isset($request->longshift2)) {
                for ($count = 0; $count < count($request->longshift2); $count++) {
                    DB::table('shiftkary')->insert([
                        'id' => date('Ymd', strtotime($request->tanggal)).$count  . 'longshift2',
                        'tanggal' => $request->tanggal,
                        'nik' =>  $request->longshift2[$count],
                        'shift' => 'longshift2',
                    ]);
                }
            }
            // Shift 3
            if (isset($request->shift3)) {
                for ($count = 0; $count < count($request->shift3); $count++) {
                    DB::table('shiftkary')->insert([
                        'id' => date('Ymd', strtotime($request->tanggal)).$count  . 'shift3',
                        'tanggal' => $request->tanggal,
                        'nik' =>  $request->shift3[$count],
                        'shift' => 'shift3',
                    ]);
                }
            }
            return redirect('/datashift');
        }
    }

    public function settingsimpan(Request $request)
    {
        $str = $request->departement;
        $new_str = str_replace(' ', '', $str);
        $mark = date('Ymd', strtotime($request->tanggal)) . $new_str;
        DB::table('datadepartement')->insert([
            'id' => $mark,
            'tanggal' => $request->tanggal,
            'departement' => $request->departement,
            'remark' => $request->remark,
            'shift1' => $request->jshift1,
            'longshift1' => $request->jlshift1,
            'shift2' => $request->jshift2,
            'longshift2' => $request->jlshift2,
            'shift3' => $request->jshift3,
            'status' => 0,
        ]);
        return redirect('/settingshift/go/' . $mark);
    }

    // ++++++++++++++++++++++++++++++++++++++++++++++++
    // +++++++++++ User Configuration +++++++++++++++++
    // ++++++++++++++++++++++++++++++++++++++++++++++++
    public function password() {
        return view('auth.changepassword');
    }

    public function changepassword(Request $request) {
        $a1 = Auth::user();
        if (Hash::check($request->oldpassword, $a1->password)) {
            DB::table('users')->where('username', $a1->username)->update(
                [
                    'password' => bcrypt($request->password1),
                ]
                
            );
            $errors = ['oldpass' => ['Password Berhasil Dirubah']]; 
            return Redirect::back()->withErrors($errors);
        }
        else {
            $errors = ['oldpass' => ['Password Salah']]; 
            return Redirect::back()->withErrors($errors);
        }
    }

    public function userpass($id) {
        $a1 = Auth::user();
        if ($a1->role == 'admin' || $a1->role == 'developer') {
            $data = DB::table('users')->where('role', '<>', 'developer')->where('role', '<>', 'admin')->where('username', $id)->get();
            return view('auth.userpass', ['data' => $data]);
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function userchangepass(Request $request) {
        $a1 = Auth::user();
        if ($a1->role == 'admin' || $a1->role == 'developer') {
            DB::table('users')->where('username', $request->username)->update([
                'password' => bcrypt($request->password1),
            ]);
            return redirect('/user');
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function user() {
        $a1 = Auth::user();
        if ($a1->role == 'admin' || $a1->role == 'developer') {
            $data = DB::table('users')->where('role', '<>', 'developer')->where('role', '<>', 'admin')->get();
            $dept = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
            return view('user', ['data' => $data, 'dept' => $dept]);
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function userhapus($id) {
        $a1 = Auth::user();
        if ($a1->role == 'admin' || $a1->role == 'developer') {
            DB::table('users')->where('username', $id)->delete();
            return redirect('/user');
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function usersimpan(Request $request) {
        $a1 = Auth::user();
        $rules = [
            'username' => ['required', 'string', 'max:150', 'unique:users'],
        ];
        $this->validate($request, $rules);
        if ($a1->role == 'admin' || $a1->role == 'developer') {
            DB::table('users')->insert([
                'name' => $request->name,
                'username' => $request->username,
                'departement' => $request->departement,
                'password' => bcrypt($request->password1),
                'role' => 'user',
            ]);
            return redirect('/user');
        }
        else {
            return redirect('/dashboard');
        }
    }

}
