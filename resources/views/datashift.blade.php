@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Data Shift') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/settingshift" role="button">Setting Shift</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Departement</th>
                <th>Shift 1</th>
                <th>Long Shift 1</th>
                <th>Shift 2</th>
                <th>Long Shift 2</th>
                <th>Shift 3</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td><a class="link" href="/datashift/{{$dt->id}}" role="button">{{$dt->tanggal}}</a></td>
                <td>{{$dt->departement}}</td>
                <td>{{$dt->shift1}}</td>
                <td>{{$dt->longshift1}}</td>
                <td>{{$dt->shift2}}</td>
                <td>{{$dt->longshift2}}</td>
                <td>{{$dt->shift3}}</td>
                <td><a class="btn btn-sm btn-outline-danger" href="/datashiftm/{{$dt->id}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

@endsection