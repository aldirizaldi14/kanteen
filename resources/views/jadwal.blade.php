@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                <div class="row">
                    <div class="col-sm-3">
                    {{ __('Jadwal Menu') }}
                </div>  
                @can('isAdmin')  
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/jadwal/plus" role="button">Tambah Jadwal</a>
                </div> 
                @endcan   
                </div> 
                </div>   
                <div class="card-body">
                <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Shift</th>
                <th>Snack 1</th>
                <th>Snack 2</th>
                <th>Menu 1</th>
                <th>Menu 2</th>
                <th>Menu 3</th>
                @can('isAdmin')
                <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td>{{date('Y-m-d', strtotime($dt->tanggal))}}</td>
                <td>{{$dt->waktu}}</td>
                <td>{{$dt->snack1}} @if ($dt->waktu == 'Shift1' || $dt->waktu == 'Shift3' ) <b>{{$dt->jsnack1}}</b> @else @endif</td>
                <td>{{$dt->snack2}} @if ($dt->waktu == 'Shift1' || $dt->waktu == 'Shift3' ) <b>{{$dt->jsnack2}}</b> @else @endif</td>
                <td>{{$dt->makanan1}} <b>{{$dt->banyaknya1}}</b></td>
                <td>{{$dt->makanan2}} <b>{{$dt->banyaknya2}}</b></td>
                <td>{{$dt->makanan3}} <b>{{$dt->banyaknya3}}</b></td>
                @can('isAdmin')
                @if (date('Y-m-d') <= date('Y-m-d', strtotime($dt->tanggal) ) ) 
                <td>
                <a class="btn btn-sm btn-outline-success" href="/jadwal/alter/{{$dt->id}}" role="button">Edit</a>
                <a class="btn btn-sm btn-outline-danger" href="/jadwal/minus/{{$dt->id}}" role="button">Hapus</a>
                </td>
                @else
                <td></td>
                @endif
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
@endsection