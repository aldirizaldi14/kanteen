@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-3">
                {{ __('Rubah Data Shift Karyawan') }}
            </div>
        </div>
    </div>
    <div class="card-body">
        <br>
        <form action="/rubahes" method="post">
        @csrf
        @foreach ($param as $pr)
        <input type="text" hidden class="form-control" name="id" value="{{$pr->id}}" required autofocus>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">Tanggal</div>
                    <div class="col-md-3">CostCenter</div>
                    <div class="col-md-3">Departement</div>
                </div>
                <div class="row">
                    <div class="col-md-3"><b>{{date('d F Y', strtotime($pr->tanggal))}}</b></div>
                    <div class="col-md-3"><b>{{$pr->costcenter}}</b></div>
                    <div class="col-md-3"><b>{{$pr->dept}}</b></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">Nik </div>
                    <div class="col-md-3"><input type="text" disabled class="form-control" name="tanggal" value="{{$pr->nik}}" required autofocus></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2">Nama </div>
                    <div class="col-md-3"><input type="text" disabled class="form-control" name="tanggal" value="{{$pr->name}}" required autofocus></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-2"><b>Shift</b></div>
                    <div class="col-md-3">
                    <select name="shift" class="custom-select">
                        <option @if ($pr->waktu == 'shift1') selected @else @endif value="shift1">Shift 1</option>
                        <option @if ($pr->waktu == 'shift2') selected @else @endif value="shift2">Shift 2</option>
                        <option @if ($pr->waktu == 'shift3') selected @else @endif value="shift3">Shift 3</option>
                    </select>
                    </div>
                </div>
                <br>
                <div class="row">
                <div class="col-md-2">
                <input type="submit" class="form-control btn btn-success" value="Simpan" autofocus>
                </div>
                </div>
                @endforeach
            </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>

@endsection