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
                    <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}" required autofocus>
                </div>
                <div class="col-sm-2">
                    <select onchange="test()" id="waktu" name="waktu" class="custom-select">
                        <option value="Shift1">Shift1</option>
                        <option value="Shift2">Shift2</option>
                        <option value="Shift3">Shift3</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" required autofocus>
                </div>
            </div>
            <br>
            <!-- Sarapan -->
            <div class="row" id="sarapan">
                <div class="col-sm-2">
                    Sarapan
                </div>
                <div class="col-sm-3">
                    <select name="snack1" class="custom-select">
                        @foreach ($snack as $sn)
                        <option value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack1" id="jsnack1" value="{{ old('jsnack1') }}" required autofocus>
                </div>
                <div class="col-sm-3">
                    <select name="snack2" class="custom-select">
                        @foreach ($snack as $sn)
                        <option value="{{$sn->nama}}">{{$sn->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2">
                <input type="number" class="form-control" name="jsnack2" id="jsnack2" value="{{ old('jsnack2') }}" required autofocus>
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
                        <option value="{{$ik->nama}}">{{$ik->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <select name="makanan2" class="custom-select">
                        @foreach ($ayam as $ay)
                        <option value="{{$ay->nama}}">{{$ay->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                        <select name="makanan3" class="custom-select">
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

<script>
function test() {
    var x = document.getElementById("waktu").value;
 if (x == "Shift1"){
    document.getElementById("sarapan").removeAttribute("hidden");
    document.getElementById("jsnack1").setAttribute("required", true); 
    document.getElementById("jsnack2").setAttribute("required", true); 
 }
 else {
    document.getElementById("sarapan").setAttribute("hidden", true); 
    document.getElementById("jsnack1").removeAttribute("required");
    document.getElementById("jsnack2").removeAttribute("required");
 }
}
</script>

@endsection
