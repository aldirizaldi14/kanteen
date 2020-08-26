@extends('layouts.home')

@section('content')
            <div class="card">
                <div class="card-header">
                <div class="row">
                    <div class="col-sm-3">
                    {{ __('Jadwal Menu') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/jadwal/plus" role="button">Tambah Jadwal</a>
                </div>    
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Shift</th>
                <th>Snack</th>
                <th>Menu 1</th>
                <th>Menu 2</th>
                <th>Menu 3</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{$dt->tanggal}}</td>
                <td>{{$dt->waktu}}</td>
                <td>{{$dt->makanan0}}</td>
                <td>{{$dt->makanan1}}</td>
                <td>{{$dt->makanan2}}</td>
                <td>{{$dt->makanan3}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
@endsection