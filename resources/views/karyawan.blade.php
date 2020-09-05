@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Karyawan') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/karyawan/plus" role="button">Tambah Karyawan</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama</th>
                <th>Deptartemen</th>
                <th>Golongan</th>
                <th>Shift</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{$dt->nik}}</td>
                <td>{{$dt->name}}</td>
                <td>@if ($dt->departemen == 'Other') {{$dt->departemen}} ({{$dt->remark}}) @else {{$dt->departemen}} @endif</td>
                <td>{{$dt->golongan}}</td>
                <td>{{$dt->shift}}</td>
                <td><a class="btn btn-sm btn-outline-success" href="/karyawan/alter/{{$dt->nik}}" role="button">Edit</a> 
                    <a class="btn btn-sm btn-outline-danger" href="/karyawan/minus/{{$dt->nik}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

@endsection