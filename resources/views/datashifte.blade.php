@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Karyawan') }}
    </div>
    <div class="card-body">
    @foreach ($data as $dt)
        <form id="dynamic_field" action="/datashiftes" method="post" enctype="multipart/form-data">
            @csrf
            <input id="id" hidden type="text" class="form-control" name="id" value="{{$dt->id}}" required autofocus>
            <!-- Nama -->
            <div class="row">
                <div class="col-sm-2">
                    Tanggal
                </div>
                <div class="col-sm-4">
                    <input id="date" type="date" class="form-control" name="date" value="{{$dt->tanggal}}" required autofocus>
                </div>
                <div class="col-sm-2">
                    <select name="shift" class="form-control" required id="shift">
                        <option value="shift1">Shift 1</option>
                        <option value="longshift1">Long Shift 1</option>
                        <option value="shift2">Shift 2</option>
                        <option value="longshift2">Long Shift 2</option>
                        <option value="shift3">Shift 3</option>
                    </select>
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
                        <option value="{{$dept}}">{{$dept}}</option>
                    </select>

                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" required autofocus>
                </div>
            </div>
            <br>
            <!-- NIK -->
            <div class="row" id="row0">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4" id="col0">
                        <select name="data[]" data-live-search="true" id="selector" class="selectpicker w-100 test">
                            @foreach ($kary as $ky)
                            <option value="{{$ky->nik}}">{{$ky->name}}</option>
                            @endforeach
                        </select>
                </div>
                <div class="col-sm-1">
                    <button name="tambah" id="tambah" type="button" class="btn btn-outline-primary">Tambah</button>
                </div>
            </div>
            <br>
        </form>
        @endforeach
    </div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
    var i = 1;
    $('#tambah').click(function() {
        i++;
        $('#dynamic_field').append('<div class="row" id="row' + i +
            '"><div class="col-sm-2"></div><div class="col-sm-4" id="col' + i +
            '" ></div><div class="col-sm-1"><button type="button" name="remove" id="' + i +
            '" class="btn btn-outline-danger btn_remove">Hapus</button></div></div><br id="br' + i +
            '">');
        $("#selector").clone().appendTo('#col' + i);
        $(".test").selectpicker();
    });
    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
        $('#br' + button_id + '').remove();
    });
});
</script>

@endsection