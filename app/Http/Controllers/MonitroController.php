<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitroController extends Controller
{
    public function monitor1()
    {
        return view('monitor1');
    }

    public function monitor2()
    {
        return view('monitor2');
    }
}
