<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataShiftImport;


class UploadController extends Controller
{
    public function view($id) {
        if ($id == 'karyawan') {
            return view('uploads.karyawan');
        }
        else if ($id == 'makanan') {
            return view('uploads.uploadmakanan');
        }
        else if ($id == 'menu') {
            return view('uploads.uploadmenu');
        }
        else if ($id == 'data') {
            return view('uploads.settingshift');
        }
        else {
            return view('errors.404');
        }
    }

    public function settingshift(Request $request){
        $path = $request->file('file'); 
        Excel::import(new DataShiftImport, $path);
        return redirect()->back()->with('message', 'Finish Upload');
    }
}
