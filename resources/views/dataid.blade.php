@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Detail Data Pesanan') }}</td>
    <td align="right">
    <a href="/data" class="btn btn-sm btn-outline-primary">Data</a>
    <a href="/data/makan" class="btn btn-sm btn-outline-dark">Peasnan</a>
    </td>
    </tr>
    </table>
    </div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th style="width:10%">Main</th>
                    <th style="width:15%">Bagian</th>
                    <th>Total</th>
                    <th>Shift 1</th>
                    <th>Long Shift 1</th>
                    <th>Shift 2</th>
                    <th>Long Shift 2</th>
                    <th>Shift 3</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr>
                    <td>{{$dt->main}}</td>
                    <td>{{$dt->departement}}</td>
                    <td>{{$dt->costcenter}}</td>
                    <td>{{$dt->shift1}}</td>
                    <td>{{$dt->longshift1}}</td>
                    <td>{{$dt->shift2}}</td>
                    <td>{{$dt->longshift2}}</td>
                    <td>{{$dt->shift3}}</td>
                    <td>{{$dt->remark}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection