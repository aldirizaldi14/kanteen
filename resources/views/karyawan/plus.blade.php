@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Karyawan') }}
    </div>
    <div class="card-body">
        <form action="simpan" method="post">
        @csrf
            <!-- Nama -->
            <div class="row">
                <div class="col-sm-2">
                    Nama
                </div>
                <div class="col-sm-4">
                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
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
                    <input id="nik" type="number" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus>
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
                    <select id="departemen" name="departemen" class="custom-select" onchange="test()">
                        <option value="Production">Production</option>
                        <option value="QC">QC</option>
                        <option value="Engineering">Engineering</option>
                        <option value="PC">PC</option>
                        <option value="Finance">Finance</option>
                        <option value="Logistic">Logistic</option>
                        <option value="HR">HR</option>
                        <option value="FE">FE</option>
                        <option value="EDP">EDP</option>
                        <option value="Sales">Sales</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <input id="remark" type="text" class="form-control" hidden name="remark" value="{{ old('remark') }}">
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
                        <option value="Kontrak">Kontrak</option>
                        <option value="Staff">Staff</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Manager">Manager</option>
                        <option value="General Manager">General Manager</option>
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
                        <option value="Shift 1">Shift 1</option>
                        <option value="Shift 2">Shift 2</option>
                        <option value="Shift 3">Shift 3</option>
                    </select>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<script>
function test() {
    var x = document.getElementById("departemen").value;
 if (x == "Other"){
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