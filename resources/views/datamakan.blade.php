@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Data Pesanan') }}</td>
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
                    <th>Shift 1</th>
                    <th>Shift 2</th>
                    <th>Shift 3</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($data as $dt)
                <tr>
                    <td><a href="/detaildata/{{$dt->tanggal}}">{{$dt->tanggal}}</a></td>
                    <td>{{$dt->shift1}}</td>
                    <td>{{$dt->shift2}}</td>
                    <td>{{$dt->shift3}}</td>
                    <td>{{$dt->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection