@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Rubah Karyawan') }}
    </div>
    <div class="card-body">
        @foreach ($data as $dt)
        <form action="simpan" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" class="form-control" hidden name="id" value="{{$dt->id}}" required autofocus>
            <div class="row">
                <div class="col-sm-6">
                        <!-- Nama -->
                        <div class="row">
                            <div class="col-sm-4">
                                Nama
                            </div>
                            <div class="col-sm-8">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{$dt->name}}" required autofocus>
                            </div>
                        </div>
                        <br>
                        <!-- NIK -->
                        <div class="row">
                            <div class="col-sm-4">
                                NIK
                            </div>
                            <div class="col-sm-8">
                                <input id="nik" type="number" min="0" class="form-control" name="nik" value="{{$dt->nik}}" required autofocus>
                            </div>
                        </div>
                        <br>
                        <!-- Dept -->
                        <div class="row">
                            <div class="col-sm-4">
                                Departement
                            </div>
                            <div class="col-sm-8">
                                <select id="departemen" name="departemen" class="custom-select">
                                    @foreach ($dept as $dp)
                                    <option @if ($dt->departemen == $dp->departement) selected @else @endif value="{{$dp->departement}}">{{$dp->departement}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <!-- NIK -->
                        <div class="row">
                            <div class="col-sm-4">
                                Golongan
                            </div>
                            <div class="col-sm-8">
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
                        <div class="row">
                            <div class="col-sm-4">
                                Gambar
                            </div>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" accept="image/*" id="file" name="file">
                            </div>
                        </div>
                </div>

                <div class="col-sm-6">
                    <div class="row">
                        <div class="col-sm-4">
                            <input type="submit" class="form-control btn btn-success" value="Simpan" autofocus>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            Photo
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-8">
                        <img src="/kimages/{{$dt->gambar}}" class="img-fluid" alt="Responsive image" >
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
</div>
</div>
</div>

@endsection