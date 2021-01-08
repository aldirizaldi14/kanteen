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
        $a1 = Auth::user();
        if ($a1->role == 'admin' || $a1->role == 'developer' ) {
            $status = DB::table('datadepartement')->where('status', 0)->where('lastedit', $a1->username)->select('status')->count();
            $dat0 = DB::table('datadepartement')->where('status', 0)->where('lastedit', $a1->username)->select('id')->value('id');
            $data = DB::table('datadepartement')->orderBy('tanggal', 'desc')->get();
        }
        else {
            $status = DB::table('datadepartement')->where('status', 0)->where('lastedit', $a1->username)->select('status')->count();
            $dat0 = DB::table('datadepartement')->where('status', 0)->where('lastedit', $a1->username)->select('id')->value('id');
            $data = DB::table('datadepartement')->join('departement', 'datadepartement.departement', '=', 'departement.departement')
            ->select('datadepartement.id', 'datadepartement.tanggal', 'datadepartement.departement', 'datadepartement.shift1', 'datadepartement.longshift1', 'datadepartement.shift2', 'datadepartement.longshift2', 'datadepartement.shift3', )
            ->where('departement.main', $a1->departement)->orderBy('tanggal', 'desc')->get();
        }
        return view('datashift', ['data' => $data, 'status' => $status, 'menuju' => $dat0]);
    }

    public function datashiftm($id){
        DB::table('datadepartement')->where('id', $id)->delete();
        DB::table('shiftkary')->where('id_data', $id)->delete();
        return redirect('/datashift');
    }

    public function marahparam($param1, $param2, $param3){
        DB::table('shiftkary')->join('karyawan', 'shiftkary.nik', '=', 'karyawan.nik')->where('id_data', $param3)->where('shift', $param2)->where('karyawan.name', $param1)->delete();
        $new = DB::table('datadepartement')->where('id', $param3)->select($param2)->value($param2) - 1;
        DB::table('datadepartement')->where('id', $param3)->update([
            $param2 => $new,
        ]);
        return redirect('/datashift/'.$param3);
    }

    public function datashifte($id) {
        $sele1 = DB::table('datadepartement')->select('departement')->where('id', $id)->value('departement');
        $data0 = DB::table('datadepartement')->where('id', $id)->get();
        $data2 = DB::table('karyawan')->where('departemen', $sele1)->orderBy('name', 'asc')->get();
        return view('datashifte', ['data' => $data0, 'dept' => $sele1, 'kary' => $data2]);
    }

    public function datashiftes(Request $request){

        for ($count = 0; $count < count($request->data); $count++) {
            
            if ($request->shift == 'longshift1') {
                if (DB::table('shiftkary')->where('shift', 'shift1')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist() && DB::table('shiftkary')->where('shift', 'shift2')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist()) {
                DB::table('shiftkary')->insert([
                    'id' => 'S0'. date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                    'id_data' => $request->id,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift0',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S1'. date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                    'id_data' => $request->id,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift1',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S2'. date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                    'id_data' => $request->id,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift2',
                ]);
                $new = DB::table('datadepartement')->where('id', $request->id)->select($request->shift)->value($request->shift) + 1;
                DB::table('datadepartement')->where('id', $request->id)->update([
                    $request->shift => $new
                ]);
                }
                else 
                {
                    // Paketan Doesnt exist
                }
            }
            elseif ($request->shift == 'longshift2') {
                if (DB::table('shiftkary')->where('shift', 'shift2')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist() && DB::table('shiftkary')->where('shift', 'shift3')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist()) {
                DB::table('shiftkary')->insert([
                    'id' => 'S2'. date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                    'id_data' => $request->id,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift2',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S3'. date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                    'id_data' => $request->id,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift3',
                ]);
                $new = DB::table('datadepartement')->where('id', $request->id)->select($request->shift)->value($request->shift) + 1;
                DB::table('datadepartement')->where('id', $request->id)->update([
                    $request->shift => $new
                ]);
            }
            else 
            {
                // Paketan Doesnt exist
            }
            }
            else {
                if (DB::table('shiftkary')->where('shift', $request->shift)->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist()) {
                if ($request->shift == 'shift1') {
                    DB::table('shiftkary')->insert([
                        'id' => 'S1'.date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                        'id_data' => $request->id,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift1',
                    ]);
                    DB::table('shiftkary')->insert([
                        'id' => 'S0'.date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                        'id_data' => $request->id,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift0',
                    ]);
                }
                elseif ($request->shift == 'shift2') {
                    DB::table('shiftkary')->insert([
                        'id' => 'S2'.date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                        'id_data' => $request->id,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift2',
                    ]);
                }
                elseif ($request->shift == 'shift3') {
                    DB::table('shiftkary')->insert([
                        'id' => 'S3'.date('Ymd', strtotime($request->date)).date('His').$request->data[$count].$count,
                        'id_data' => $request->id,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift3',
                    ]);
                }
                $new = DB::table('datadepartement')->where('id', $request->id)->select($request->shift)->value($request->shift) + 1;
                DB::table('datadepartement')->where('id', $request->id)->update([
                    $request->shift => $new
                ]);
            }
            else 
            {
                // Paketan Doesnt exist
            }
            }

        }
        return redirect('/datashift/'.$request->id);
    }

    public function refresh($id){
        $a1 = Auth::user();
        DB::table('datadepartement')->where('status', 0)->where('lastedit', $a1->username)->where('id', $id)->delete();
        return redirect('/datashift');
    }

    public function detailshift($id){
        $alldata = DB::table('datadepartement')->where('id', $id)->get();
        $shift1 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift1')->select('name', 'shift')->pluck('name');
        $shift2 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'longshift1')->select('name', 'shift')->pluck('name');
        $shift3 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift2')->select('name', 'shift')->pluck('name');
        $shift4 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'longshift2')->select('name', 'shift')->pluck('name');
        $shift5 = DB::table('shiftkary')->join('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->where('id_data', $id)->where('shift', 'shift3')->select('name', 'shift')->pluck('name');
        $join = collect([$shift1, $shift2, $shift3, $shift4, $shift5])->transpose()->toArray();
        // return $shift1;
        return view('shiftdetail', ['data' => $alldata, 'union' => $join]);
    }

    public function settingshift()
    {
        $a1 = Auth::user();
        $index = 0;

        if ($a1->role == 'admin' || $a1->role == 'developer') {
            $karyawan = DB::table('karyawan')->orderBy('name', 'asc')->get();
            $data = DB::table('departement')->select('departement')->orderBy('main', 'asc')->get();
        }
        else {
            $karyawan = DB::table('karyawan')->where('departemen', $a1->departement)->orderBy('name', 'asc')->get();
            $data = DB::table('opsi_user')->select('opsi')->where('username', $a1->username)->orderBy('opsi', 'asc')->get();
        }
        return view('settingshift', ['dept' => $data, 'data' => $karyawan, 'i' => $index]);
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
        $a1 = Auth::user();
        $str = $request->departement;
        $new_str = str_replace(' ', '', $str);
        $mark = date('Ymd', strtotime($request->tanggal)) . $new_str;
        $a = 0;
        $b = 0;
        $c = 0;
        $d = 0;
        $e = 0;
        $inc = 0;

        $jumlah = DB::table('karyawan')->where('departemen', $request->departement)->count();

        for ($x = 0 ; $x < $jumlah ; $x++) {
            if ($request->input('shift'.$x) == 'shift1') {
                DB::table('shiftkary')->insert([
                    'id' => 'S1'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$a,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift1',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S0'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$a,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift0',
                ]);
                $a++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'longshift1') {
                DB::table('shiftkary')->insert([
                    'id' => 'S0'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$a,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift0',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S1'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$b,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift1',
                    ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$b,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                ]);
                $b++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'shift2') {
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$c,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                ]);
                $c++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'longshift2') {
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$d,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                    ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S3'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$d,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift3',
                ]);
                $d++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'shift3') {
                DB::table('shiftkary')->insert([
                    'id' => 'S3'.date('Ymd', strtotime($request->tanggal)).date('His').$request->input('nik'.$x).$e,
                    'id_data' => $mark,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift3',
                    ]);
                    $e++;
                    $inc++;
            }
            else {
            }
        }
        DB::table('datadepartement')->insert([
            'id' => $mark,
            'tanggal' => $request->tanggal,
            'departement' => $request->departement,
            'remark' => $request->remark,
            'shift1' => $a,
            'longshift1' => $b,
            'shift2' => $c,
            'longshift2' => $d,
            'shift3' => $e,
            'status' => 1,
            'lastedit' => $a1->username,
        ]);
        return redirect('/datashift');
    }

    public function settingsimpan(Request $request)
    {
        $karyawan = DB::table('karyawan')->where('departemen', $request->departement)->get();
        return view('settingshiftgo', ['data' => $karyawan, 
        'remark' => $request->remark, 'tanggal' => $request->tanggal, 'i' => 0,
        'departement' => $request->departement]);
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
            $dept = DB::table('departement')->select('main')->orderBy('main', 'asc')->distinct()->get();
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
            DB::table('opsi_user')->where('username', $id)->delete();
            return redirect('/user');
        }
        else {
            return redirect('/dashboard');
        }
    }

    public function usersimpan(Request $request) {
        $a1 = Auth::user();
        $rules = [
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'opsi' => ['required'],
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
            for ($htng = 0; $htng < count($request->opsi); $htng++) {
                DB::table('opsi_user')->insert([
                    'username' => $request->username,
                    'opsi' => $request->opsi[$htng],
                ]);
            }
            return redirect('/user');
        }
        else {
            return redirect('/dashboard');
        }
    }

}