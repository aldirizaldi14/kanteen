<?php

namespace App\Http\Controllers;

use File;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\DataShiftImport;
use App\Imports\KaryawanImport;
use App\Imports\MakananImport;
use App\Imports\MenuMakanImport;


class UploadController extends Controller
{
    public function view($id) {
        if ($id == 'karywawan') {
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
    public function uploadkaryawan(Request $request){
        $path = $request->file('file'); 
        Excel::import(new KaryawanImport, $path);
        return redirect()->back()->with('message', 'Finish Upload');
    }
    public function uploadmakanan(Request $request){
        $path = $request->file('file'); 
        Excel::import(new MakananImport, $path);
        return redirect()->back()->with('message', 'Finish Upload');
    }
    public function uploadmenu(Request $request){
        $path = $request->file('file'); 
        Excel::import(new MenuMakanImport, $path);
        return redirect()->back()->with('message', 'Finish Upload');
    }
}
