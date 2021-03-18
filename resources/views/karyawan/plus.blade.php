@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Karyawan') }}
    </div>
    <div class="card-body">
        <form action="simpan" method="post" enctype="multipart/form-data">
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
                    <input id="nik" type="number" min="0" class="form-control" name="nik" value="{{ old('nik') }}" required autofocus>
                </div>
            </div>
            <br>
            <!-- NIK -->
            <div class="row">
                <div class="col-sm-2">
                    RFID
                </div>
                <div class="col-sm-4">
                    <input id="rfid" type="number" min="0" class="form-control" name="rfid" value="{{ old('rfid') }}" required autofocus>
                </div>
            </div>
            <br>
            <!-- Dept -->
            <div class="row">
                <div class="col-sm-2">
                    Departement
                </div>
                <div class="col-sm-4">
                <select name="departemen" data-live-search="true" id="selector" class="selectpicker w-100">
                    @foreach ($dept as $dp)
                        <option value="{{$dp->departement}}">{{$dp->departement}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="col-sm-4">
                    <input id="remark" type="text" class="form-control" hidden name="remark" value="{{ old('remark') }}">
                </div>
            </div>
            <br>
            <!-- Dept -->
            <div class="row">
                <div class="col-sm-2">
                    Limit Makan
                </div>
                <div class="col-sm-4">
                    <input id="fungsi" type="number" min="0" class="form-control" name="fungsi" value="{{ old('fungsi') }}" required autofocus>
                </div>
                </div>
                <br>
            <!-- Images -->
            <div class="row">
                <div class="col-sm-2">
                    Gambar
                </div>
                <div class="col-sm-4">
                <input type="file" class="form-control" accept="image/*" id="file" name="file">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection