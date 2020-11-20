@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Data Departement') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/departement/plus" role="button">Tambah Departement</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Main</th>
                <th>Nama Departement</th>
                <th>Cost Center</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{$dt->main}}</td>
                <td>{{$dt->departement}}</td>
                <td>{{$dt->costcenter}}</td>
                <td><a class="btn btn-sm btn-outline-success" href="/departement/alter/{{$dt->id}}" role="button">Edit</a> 
                    <a class="btn btn-sm btn-outline-danger" href="/departement/minus/{{$dt->id}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

@endsection