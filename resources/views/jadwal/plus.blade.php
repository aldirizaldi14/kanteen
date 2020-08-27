@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Jadwal Menu') }}
    </div>
    <div class="card-body">
        <form action="simpan" method="post">
            @csrf
            <!-- Tanggal -->
            <div class="row">
                <div class="col-sm-2">
                    Tanggal
                </div>
                <div class="col-sm-4">
                    <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" required autofocus>
                </div>
                <div class="col-sm-2">
                    <select name="waktu" class="custom-select">
                        <option value="Shift 1">Shift 1</option>
                        <option value="Shift 2">Shift 2</option>
                        <option value="Shift 3">Shift 3</option>
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
                        <option value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack1" value="{{ old('jsnack1') }}" required autofocus>
                </div>
                <div class="col-sm-3">
                    <select name="snack2" class="custom-select">
                        @foreach ($snack as $sn)
                        <option value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack2" value="{{ old('jsnack2') }}" required autofocus>
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
                    <select name="shift" class="custom-select">
                        @foreach ($ikan as $ik)
                        <option value="{{$ik->nama}}">{{$ik->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <select name="shift" class="custom-select">
                        @foreach ($ayam as $ay)
                        <option value="{{$ay->nama}}">{{$ay->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                        <select name="shift" class="custom-select">
                            @foreach ($daging as $dg)
                            <option value="{{$dg->nama}}">{{$dg->nama}}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <br>
            <!-- Jumlah Main Course -->
            <div class="row">
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya1" value="{{ old('banyaknya1') }}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya2" value="{{ old('banyaknya2') }}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            <div class="col-sm-2">
                <input type="number" class="form-control" name="banyaknya3" value="{{ old('banyaknya3') }}" required autofocus>
            </div>
            <div class="col-sm-2">

            </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection
