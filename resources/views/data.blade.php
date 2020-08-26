@extends('layouts.home')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Data') }}</div>
    <div class="card-body">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Sarapan Dimakan</th>
                    <th>Menu 1 Dimakan</th>
                    <th>Menu 2 Dimakan</th>
                    <th>Menu 3 Dimakan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr>
                    <td>{{$dt->nik}}</td>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->departemen}}</td>
                    <td>{{$dt->golongan}}</td>
                    <td>{{$dt->shift}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection