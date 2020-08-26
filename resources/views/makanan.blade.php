@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Makanan') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/makanan/plus" role="button">Tambah Makanan</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Nama Makanan</th>
                <th>Jenis Makanan</th>
                <th>Harga</th>
                <th>Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{$dt->nama}}</td>
                <td>{{$dt->jenis}}</td>
                <td>{{$dt->harga}}</td>
                <td>{{$dt->gambar}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

@endsection