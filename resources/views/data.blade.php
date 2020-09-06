@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
    <table class="w-100">
    <tr>
    <td align="left">{{ __('Data') }}</td>
    <td align="right">
    <a href="/data" class="btn btn-sm btn-outline-primary">Data</a>
    <a href="/data/makan" class="btn btn-sm btn-outline-dark">Pesaanan</a>
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
                    <td>14-08-2020</td>
                    <td>Shift 1</td>
                    <td>35</td>
                    <td>14</td>
                    <td>10</td>
                    <td>25</td>
                    <td>55</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection