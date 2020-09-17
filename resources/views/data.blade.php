@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Data Makanan Di Makan') }}</td>
    <td align="right">
    <a href="/data" class="btn btn-sm btn-outline-primary">Data</a>
    <a href="/data/makan" class="btn btn-sm btn-outline-dark">Pesanan</a>
    </td>
    </tr>
    </table>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th style="width:15%">Tanggal</th>
                    <th style="width:15%">Shift</th>
                    <th>Sarapan 1 Dimakan</th>
                    <th>Sarapan 2 Dimakan</th>
                    <th>Menu 1 Dimakan</th>
                    <th>Menu 2 Dimakan</th>
                    <th>Menu 3 Dimakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr>
                    <td><a href="/datam/{{$dt->tanggal}}{{$dt->waktu}}">{{$dt->tanggal}}</a></td>
                    <td>{{$dt->waktu}}</td>
                    <td>{{$dt->sarapan1_count}}</td>
                    <td>{{$dt->sarapan2_count}}</td>
                    <td>{{$dt->device1_count}}</td>
                    <td>{{$dt->device2_count}}</td>
                    <td>{{$dt->device3_count}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


@endsection