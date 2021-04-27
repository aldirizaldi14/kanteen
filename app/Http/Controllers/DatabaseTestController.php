<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use DataTables;

class DatabaseTestController extends Controller
{
	public function index()
    {   

    	$hariini = Carbon::now();
    	$now = date('H:i');
        $s1  = date('H:i', strtotime("05:25"));
        $as1 = date('H:i', strtotime("08:30"));
        $a1  = date('H:i', strtotime("11:00"));
        $ak1 = date('H:i', strtotime("14:15"));
        $a2  = date('H:i', strtotime("17:00"));
        $ak2 = date('H:i', strtotime("19:15"));
        $a3  = date('H:i', strtotime("02:00"));
        $ak3 = date('H:i', strtotime("03:15"));

    	$queryall =  DB::connection('mysql2')->select("select cm.company_name, COUNT(*) as total
			from t_attendance att left join sys_company cm ON att.company_id=cm.company_id
			where att.attendance_time BETWEEN  '2021-04-22 17:00:00' AND '2021-04-22 23:00:00'
			GROUP BY cm.company_name");
        
       	$alldept =  DB::connection('mysql2')->select("select cm.company_name, COUNT(*) as total
			from t_attendance att left join sys_company cm ON att.company_id=cm.company_id
			where att.attendance_time BETWEEN  '2021-04-22 17:00:00' AND '2021-04-22 23:00:00' and cm.company_name = 'All Dept'
			GROUP BY cm.company_name");
        
        $dailyworker =  DB::connection('mysql2')->select("select cm.company_name, COUNT(*) as total
			from t_attendance att left join sys_company cm ON att.company_id=cm.company_id
			where att.attendance_time BETWEEN  '2021-04-22 17:00:00' AND '2021-04-22 23:00:00' and cm.company_name = 'DailyWorker'
			GROUP BY cm.company_name");
        
        $shelter =  DB::connection('mysql2')->select("select cm.company_name, COUNT(*) as total
			from t_attendance att left join sys_company cm ON att.company_id=cm.company_id
			where att.attendance_time BETWEEN  '2021-04-22 17:00:00' AND '2021-04-22 23:00:00' and cm.company_name = 'Shelter'
			GROUP BY cm.company_name");
        
        
        return $hariini;
        //return view('summary', compact('queryall'));
    }
}