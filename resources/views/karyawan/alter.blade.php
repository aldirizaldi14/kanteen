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
                        <!-- NIK -->
                        <div class="row">
                            <div class="col-sm-4">
                                RFID
                            </div>
                            <div class="col-sm-8">
                                <input id="rfid" type="number" min="0" class="form-control" name="rfid" value="{{$dt->rfid}}" required autofocus>
                            </div>
                        </div>
                        <br>
                        <!-- Dept -->
                        <div class="row">
                            <div class="col-sm-4">
                                Departement
                            </div>
                            <div class="col-sm-8">
                            <select name="departemen" id required data-live-search="true" id="selector" class="selectpicker w-100">
                                    @foreach ($dept as $dp)
                                    <option @if ($dt->departemen == $dp->departement) selected @else @endif value="{{$dp->departement}}">{{$dp->departement}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <!-- Dept -->
                        <div class="row">
                            <div class="col-sm-4">
                                Limit Makan
                            </div>
                            <div class="col-sm-8">
                                <input id="fungsi" required type="number" min="0" class="form-control" name="fungsi" value="{{$dt->fungsi}}" required autofocus>
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