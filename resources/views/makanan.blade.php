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
                <th>Dimakan</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @for ($i = 0; $i < count($union); $i++)
            <tr>
                    <td align="center">{{$union[$i][1]}}</td>
                    <td align="center">{{$union[$i][2]}}</td>
                    <td align="center">{{$union[$i][3]}}</td>
                    <td align="center">{{$union[$i][4]}}</td>
                <td>
                <a class="btn btn-sm btn-outline-primary" href="/makanan/alter/{{$union[$i][1]}}" role="button">Edit</a> 
                <a class="btn btn-sm btn-outline-danger" href="/makanan/minus/{{$union[$i][1]}}" role="button">Hapus</a>
                </td>
            </tr>
        @endfor
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

@endsection