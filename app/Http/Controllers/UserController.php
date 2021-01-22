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
            $data = DB::table('shiftkary')->join('departement', 'shiftkary.id_data', '=', 'departement.costcenter')
            ->select('shiftkary.tanggal as tanggal', 'departement.departement as departement',  'shiftkary.id_data as costcenter',
            DB::raw("count(case when shift = 'shift1' then 1 end) as shift1"), 
            DB::raw("count(case when shift = 'shift2' then 1 end) as shift2"), 
            DB::raw("count(case when shift = 'shift3' then 1 end) as shift3"), 
            )
            ->groupBy('shiftkary.tanggal', 'departement.departement', 'shiftkary.id_data')
            ->orderBy('tanggal', 'desc')->get();
        }
        else {
            $data = DB::table('shiftkary')->join('departement', 'shiftkary.id_data', '=', 'departement.departement')
            ->select('shiftkary.tanggal as tanggal', 'departement.departement as departement',   'shiftkary.id_data as costcenter',
            DB::raw("count(case when shift = 'shift1' then 1 end) as shift1"), 
            DB::raw("count(case when shift = 'shift2' then 1 end) as shift2"), 
            DB::raw("count(case when shift = 'shift3' then 1 end) as shift3"), 
            )
            ->groupBy('shiftkary.tanggal', 'departement.departement', 'shiftkary.id_data')
            ->where('departement.main', $a1->departement)->orderBy('tanggal', 'desc')->get();
        }
        return view('datashift', ['data' => $data]);
    }

    public function datashiftm($id){
        $tanggal = substr($id, 0,10);
        $deptart = substr($id, 10);
        DB::table('shiftkary')->where('id_data', $deptart)->where('tanggal', $tanggal)->delete();
        return redirect('/datashift');
    }

    public function marahe($param1){
        DB::table('shiftkary')->where('id', $param1)->delete();
        return redirect('/datashift/'.$param3);
    }
    public function rubahe($param1){
        $data = DB::table('shiftkary')->leftJoin('karyawan', 'karyawan.nik', '=', 'shiftkary.nik')->join('departement', 'departement.costcenter', '=', 'shiftkary.id_data')
        ->select('shiftkary.id as id', 'shiftkary.nik as nik', 'karyawan.name as name', 'shiftkary.shift as waktu', 'shiftkary.tanggal as tanggal', 'shiftkary.id_data as costcenter', 'departement.departement as dept')
        ->where('shiftkary.id', $param1)->get();
        return view('jadwal.rubahe', ['param' => $data]);
    }

    public function rubahes(Request $request){
        $a = DB::table('shiftkary')->where('id', $request->id)->select('tanggal')->value('tanggal');
        $b = DB::table('shiftkary')->where('id', $request->id)->select('id_data')->value('id_data');
        $c = DB::table('shiftkary')->where('id', $request->id)->select('nik')->value('nik');
        $op1 = DB::table('shiftkary')->where('id', $request->id)->select('shift')->value('shift');
        $b1 = substr($request->id, 2);
        $b2 = substr($request->shift, 5);
        if ($op1 == $request->shift) {
            // Do Nothing
        } else {
            if ($op1 == 'shift0') {
                DB::table('shiftkary')->where('nik', $c)->where('tanggal', $a)->where('id_data', $b)->where('shift', 'shift1')->delete();
                DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
            } elseif ($op1 == 'shift1') {
                DB::table('shiftkary')->where('nik', $c)->where('tanggal', $a)->where('id_data', $b)->where('shift', 'shift0')->delete();
                DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
            } elseif ($op1 == 'shift2') {
                if ($request->shift == 'shift3') {
                    DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
                } else {
                    DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
                    DB::table('shiftkary')->insert([
                        'id' => 'U0'.$b1,
                        'id_data' => $b,
                        'tanggal' => $a,
                        'nik' => $c,
                        'shift' => 'shift0',
                        'status' => 0
                        ]);
                }
            } elseif ($op1 == 'shift3') {
                if ($request->shift == 'shift2') {
                    DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
                } else {
                    DB::table('shiftkary')->where('id', $request->id)->update(['id' => 'U'.$b2.$b1, 'shift' => $request->shift,]);
                    DB::table('shiftkary')->insert([
                        'id' => 'U0'.$b1,
                        'id_data' => $b,
                        'tanggal' => $a,
                        'nik' => $c,
                        'shift' => 'shift0',
                        'status' => 0
                        ]);
                }
            }
        }
        return redirect('/datashift/'.$a.$b);
    }

    public function datashifte($id) {
        $tanggal = substr($id, 0,10);
        $deptart = substr($id, 10);

        $sele1 = DB::table('datadepartement')->select('departement')->where('id', $deptart)->value('departement');
        $sele2 = DB::table('departement')->select('costcenter')->where('departement', $deptart)->value('costcenter');
        $data2 = DB::table('karyawan')->where('departemen', $deptart)->orderBy('name', 'asc')->get();
        return view('datashifte', ['tanggal' => $tanggal, 'dept' => $deptart, 'kary' => $data2, 'costcenter' => $sele2]);
    }

    public function datashiftes(Request $request){

        for ($count = 0; $count < count($request->data); $count++) {
            
            if ($request->shift == 'longshift1') {
                if (DB::table('shiftkary')->where('shift', 'shift1')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist() && DB::table('shiftkary')->where('shift', 'shift2')->where('tanggal', $request->date)->where('nik', $request->data[$count])->doesntExist()) {
                DB::table('shiftkary')->insert([
                    'id' => 'S0'. date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                    'id_data' => $request->departemen,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift0',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S1'. date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                    'id_data' => $request->departemen,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift1',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S2'. date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                    'id_data' => $request->departemen,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift2',
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
                    'id' => 'S2'. date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                    'id_data' => $request->departemen,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift2',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S3'. date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                    'id_data' => $request->departemen,
                    'tanggal' => $request->date,
                    'nik' =>  $request->data[$count],
                    'shift' => 'shift3',
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
                        'id' => 'S1'.date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                        'id_data' => $request->departemen,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift1',
                    ]);
                    DB::table('shiftkary')->insert([
                        'id' => 'S0'.date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                        'id_data' => $request->departemen,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift0',
                    ]);
                }
                elseif ($request->shift == 'shift2') {
                    DB::table('shiftkary')->insert([
                        'id' => 'S2'.date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                        'id_data' => $request->departemen,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift2',
                    ]);
                }
                elseif ($request->shift == 'shift3') {
                    DB::table('shiftkary')->insert([
                        'id' => 'S3'.date('Ymd', strtotime($request->date)).$request->data[$count].$count,
                        'id_data' => $request->departemen,
                        'tanggal' => $request->date,
                        'nik' =>  $request->data[$count],
                        'shift' => 'shift3',
                    ]);
                }
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
        $tanggal = substr($id, 0,10);
        $deptart = substr($id, 10);

        $alldata = DB::table('shiftkary')->where('id_data', $deptart)->where('tanggal', $tanggal)
        ->select('id_data', 'tanggal', 
        DB::raw("count(case when shift = 'shift1' then 1 end) as shift1"), 
        DB::raw("count(case when shift = 'shift2' then 1 end) as shift2"), 
        DB::raw("count(case when shift = 'shift3' then 1 end) as shift3"), 
        )->groupBy('tanggal', 'id_data')
        ->orderBy('tanggal', 'desc')->get();

        $karyawan = DB::table('shiftkary')->where('shiftkary.id_data', $deptart)->where('shiftkary.tanggal', $tanggal)->where('shift', '!=', 'shift0')
        ->leftjoin('karyawan', 'shiftkary.nik', '=', 'karyawan.nik')
        ->select('shiftkary.nik', 'karyawan.name', 'shiftkary.shift', 'shiftkary.status', 'shiftkary.id as id')
        ->get();
        return view('shiftdetail', ['data' => $alldata, 'daftar' => $karyawan, 'tanggal' => $tanggal, 'dept' => $deptart, 'i' => 1]);
    }

    public function settingshift()
    {
        $a1 = Auth::user();
        $index = 0;

        if ($a1->role == 'admin' || $a1->role == 'developer') {
            $karyawan = DB::table('karyawan')->orderBy('name', 'asc')->get();
            $data = DB::table('departement')->select('departement', 'costcenter')->orderBy('main', 'asc')->get();
        }
        else {
            $karyawan = DB::table('karyawan')->where('departemen', $a1->departement)->orderBy('name', 'asc')->get();
            $data = DB::table('opsi_user')
            ->join('departement', 'departement.departeement', '=', 'opsi_user.opsi')
            ->select('opsi_user.opsi as opsi', 'departeemnt.costcenter as costcenter')->where('username', $a1->username)->orderBy('opsi', 'asc')->get();
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
                    'id' => 'S1'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$a,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift1',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S0'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$a,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift0',
                ]);
                $a++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'longshift1') {
                DB::table('shiftkary')->insert([
                    'id' => 'S0'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$a,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift0',
                ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S1'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$b,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift1',
                    ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$b,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                ]);
                $b++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'shift2') {
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$c,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                ]);
                $c++;
                $inc++;
            }
            elseif ($request->input('shift'.$x) == 'longshift2') {
                DB::table('shiftkary')->insert([
                    'id' => 'S2'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$d,
                    'id_data' => $request->departement,
                    'tanggal' => $request->tanggal,
                    'nik' =>  $request->input('nik'.$x),
                    'shift' => 'shift2',
                    ]);
                DB::table('shiftkary')->insert([
                    'id' => 'S3'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$d,
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
                    'id' => 'S3'.date('Ymd', strtotime($request->tanggal)).$request->input('nik'.$x).$e,
                    'id_data' => $request->departement,
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