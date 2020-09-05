@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Karyawan') }}
    </div>
    <div class="card-body">
        @foreach ($data as $dt)
        <form action="simpan" method="post">
        @csrf
        <input type="text" class="form-control" hidden name="id" value="{{$dt->id}}" required autofocus>
            <!-- Nama -->
            <div class="row">
                <div class="col-sm-2">
                    Nama
                </div>
                <div class="col-sm-4">
                    <input id="nama" type="text" class="form-control" name="nama" value="{{$dt->name}}" required autofocus>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" required autofocus>
                </div>
            </div>
            <br>
            <!-- NIK -->
            <div class="row">
                <div class="col-sm-2">
                    NIK
                </div>
                <div class="col-sm-4">
                    <input id="nik" type="number" class="form-control" name="nik" value="{{$dt->nik}}" required autofocus>
                </div>
                <div class="col-sm-2">
Remark
</div>
            </div>
            <br>
            <!-- Dept -->
            <div class="row">
                <div class="col-sm-2">
                    Departement
                </div>
                <div class="col-sm-4">
                    <select id="departemen" name="departemen" class="custom-select">
                        <option @if ($dt->departemen == 'Production') selected @else @endif value="Production">Production</option>
                        <option @if ($dt->departemen == 'QC') selected @else @endif value="QC">QC</option>
                        <option @if ($dt->departemen == 'Engineering') selected @else @endif value="Engineering">Engineering</option>
                        <option @if ($dt->departemen == 'PC') selected @else @endif value="PC">PC</option>
                        <option @if ($dt->departemen == 'Finance') selected @else @endif value="Finance">Finance</option>
                        <option @if ($dt->departemen == 'Logistic') selected @else @endif value="Logistic">Logistic</option>
                        <option @if ($dt->departemen == 'HR') selected @else @endif value="HR">HR</option>
                        <option @if ($dt->departemen == 'FE') selected @else @endif value="FE">FE</option>
                        <option @if ($dt->departemen == 'EDP') selected @else @endif value="EDP">EDP</option>
                        <option @if ($dt->departemen == 'Sales') selected @else @endif value="Sales">Sales</option>
                        <option @if ($dt->departemen == 'Other') selected @else @endif value="Other">Other</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input id="remark" type="text" class="form-control" name="remark" @if ($dt->departemen == 'Other') required @else hidden @endif value="{{$dt->remark}}">
                </div>
            </div>
            <br>
            <!-- NIK -->
            <div class="row">
                <div class="col-sm-2">
                    Golongan
                </div>
                <div class="col-sm-4">
                    <select name="golongan" class="custom-select">
                        <option @if ($dt->golongan == 'Kontrak') selected @else @endif value="Kontrak">Kontrak</option>
                        <option @if ($dt->golongan == 'Staff') selected @else @endif value="Staff">Staff</option>
                        <option @if ($dt->golongan == 'Supervisor') selected @else @endif value="Supervisor">Supervisor</option>
                        <option @if ($dt->golongan == 'Manager') selected @else @endif value="Manager">Manager</option>
                        <option @if ($dt->golongan == 'General Manager') selected @else @endif value="General Manager">General Manager</option>
                    </select>
                </div>
            </div>
            <br>
            <!-- Shift -->
            <div class="row">
                <div class="col-sm-2">
                    Shift
                </div>
                <div class="col-sm-4">
                    <select name="shift" class="custom-select">
                        <option @if ($dt->shift == 'Shift 1') selected @else @endif value="Shift 1">Shift 1</option>
                        <option @if ($dt->shift == 'Shift 2') selected @else @endif value="Shift 2">Shift 2</option>
                        <option @if ($dt->shift == 'Shift 3') selected @else @endif value="Shift 3">Shift 3</option>
                    </select>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
</div>
</div>

<script>
function test() {
    var x = document.getElementById("departemen").value;
 if (x === "Other"){
    document.getElementById("remark").removeAttribute("hidden");
    document.getElementById("remark").setAttribute("required", true); 
 }
 else {
    document.getElementById("remark").setAttribute("hidden", true); 
    document.getElementById("remark").removeAttribute("required");
 }
}
</script>

@endsection