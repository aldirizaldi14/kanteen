@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Data') }}</td>
    <td align="right">
    <a href="/data" class="btn btn-sm btn-outline-primary">Data</a>
    <a href="/data/makan" class="btn btn-sm btn-outline-dark">Makan</a>
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
                    <th>Long Shift 1</th>
                    <th>Shift 2</th>
                    <th>Long Shift 2</th>
                    <th>Shift 3</th>
                </tr>
            </thead>
            <tbody>
            @for ($i = 0; $i < count($union); $i++)
                <tr>
                    <td align="center"><a href="/detaildata/{{$union[$i][0]}}">{{date('d F Y', strtotime($union[$i][0]))}}</a></td>
                    <td align="center">{{$union[$i][1]}}</td>
                    <td align="center">{{$union[$i][2]}}</td>
                    <td align="center">{{$union[$i][3]}}</td>
                    <td align="center">{{$union[$i][4]}}</td>
                    <td align="center">{{$union[$i][5]}}</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection