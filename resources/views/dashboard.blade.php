@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-9">
                Menu Hari Ini
            </div>
            <div class="col-sm-3">
                Tanggal {{date('d-M-Y')}}
            </div>
        </div>
        <br>
        <table class="w-100">
<tr>
    <td style="width:10%"></td>
    <td style="width:30%" align="center">Shift 1</td>
    <td style="width:30%" align="center">Shift 2</td>
    <td style="width:30%" align="center">Shift 3</td>
</tr>
<tr>
    <td>        <table class="w-100">
    <tr>
        <td>Snack 1</td>
    </tr>
    <tr>
    <td>Snack 2</td>
    </tr>
    <tr>
    <td>Ikan</td>
    </tr>
    <tr>
    <td>Ayam</td>
    </tr>
    <tr>
    <td>Daging</td>
    </tr>
    </table></td>
    <td>
        <table class="w-100">
    @foreach ($data1 as $dt1)
    <tr>
        <td>{{$dt1->snack1}}</td>
    </tr>
    <tr>
        <td>{{$dt1->snack2}}</td>
    </tr>
    <tr>
        <td>{{$dt1->makanan1}}</td>
    </tr>
    <tr>
        <td>{{$dt1->makanan2}}</td>
    </tr>
    <tr>
        <td>{{$dt1->makanan3}}</td>
    </tr>
    @endforeach
    </table>
</td>
    <td>
    <table class="w-100">
    @foreach ($data2 as $dt2)
    <tr>
        <td>{{$dt2->snack1}}</td>
    </tr>
    <tr>
        <td>{{$dt2->snack2}}</td>
    </tr>
    <tr>
        <td>{{$dt2->makanan1}}</td>
    </tr>
    <tr>
        <td>{{$dt2->makanan2}}</td>
    </tr>
    <tr>
        <td>{{$dt2->makanan3}}</td>
    </tr>
    @endforeach
    </table>
    </td>
    <td>
    <table class="w-100">
    @foreach ($data3 as $dt3)
    <tr>
        <td>{{$dt3->snack1}}</td>
    </tr>
    <tr>
        <td>{{$dt3->snack2}}</td>
    </tr>
    <tr>
        <td>{{$dt3->makanan1}}</td>
    </tr>
    <tr>
        <td>{{$dt3->makanan2}}</td>
    </tr>
    <tr>
        <td>{{$dt3->makanan3}}</td>
    </tr>
    @endforeach
    </table>
    </td>
</tr>
        </table>
        </div>
    </div>
</div>
</div>
</div>
@endsection