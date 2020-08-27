@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Jadwal Menu') }}
    </div>
    <div class="card-body">
        @foreach ($data as $dt)
        <form action="simpan" method="post">
            @csrf
            <input type="text" class="form-control" name="id" value="{{$dt->id}}" hidden>
            <!-- Tanggal -->
            <div class="row">
                <div class="col-sm-2">
                    Tanggal
                </div>
                <div class="col-sm-4">
                    <input type="date" class="form-control" name="tanggal" value="{{$dt->tanggal}}" required autofocus>
                </div>
                <div class="col-sm-2">
                    <select name="waktu" class="custom-select">
                        <option @if ($dt->waktu == 'Shift1') selected @else @endif value="Shift1">Shift1</option>
                        <option @if ($dt->waktu == 'Shift2') selected @else @endif value="Shift2">Shift2</option>
                        <option @if ($dt->waktu == 'Shift3') selected @else @endif value="Shift3">Shift3</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" required autofocus>
                </div>
            </div>
            <br>
            <!-- Sarapan -->
            <div class="row">
                <div class="col-sm-2">
                    Snack
                </div>
                <div class="col-sm-3">
                    <select name="snack1" class="custom-select">
                        @foreach ($snack as $sn)
                        <option @if ($dt->snack1 == $sn->nama) selected @else @endif value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack1" value="{{$dt->jsnack1}}" required autofocus>
                </div>
                <div class="col-sm-3">
                    <select name="snack2" class="custom-select">
                        @foreach ($snack as $sn)
                        <option @if ($dt->snack2 == $sn->nama) selected @else @endif value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack2" value="{{$dt->jsnack2}}" required autofocus>
                </div>
            </div>
            <br>
            <!-- Main Course -->
            <div class="row">
                <div class="col-sm-4" align="center">
                    Ikan
                </div>
                <div class="col-sm-4" align="center">
                    Ayam
                </div>
                <div class="col-sm-4" align="center">
                    Daging
                </div>
            </div>
            <br>
            <!-- Option Main Course -->
            <div class="row">
                <div class="col-sm-4">
                    <select name="makanan1" class="custom-select">
                        @foreach ($ikan as $ik)
                        <option @if ($dt->makanan1 == $ik->nama) selected @else @endif value="{{$ik->nama}}">{{$ik->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <select name="makanan2" class="custom-select">
                        @foreach ($ayam as $ay)
                        <option @if ($dt->makanan2 == $ay->nama) selected @else @endif value="{{$ay->nama}}">{{$ay->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                        <select name="makanan3" class="custom-select">
                            @foreach ($daging as $dg)
                            <option @if ($dt->makanan3 == $dg->nama) selected @else @endif value="{{$dg->nama}}">{{$dg->nama}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <br>
            <!-- Jumlah Main Course -->
            <div class="row">
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya1" value="{{$dt->banyaknya1}}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya2" value="{{$dt->banyaknya2}}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya3" value="{{$dt->banyaknya3}}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
</div>
</div>

@endsection
