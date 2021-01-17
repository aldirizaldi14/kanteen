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
                @for ($i = 0; $i < count($union); $i++)
                <tr>
                    <td align="center"><a href="/datam/{{$union[$i][0]}}{{$union[$i][1]}}">{{date('d F Y', strtotime($union[$i][0]))}}</a></td>
                    <td align="center">{{$union[$i][1]}}</td>
                    <td align="center">{{$union[$i][2]}}</td>
                    <td align="center">{{$union[$i][3]}}</td>
                    <td align="center">{{$union[$i][4]}}</td>
                    <td align="center">{{$union[$i][5]}}</td>
                    <td align="center">{{$union[$i][6]}}</td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>
</div>
</div>
</div>


@endsection