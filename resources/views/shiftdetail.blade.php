@extends('layouts.home')

@section('content')

<script>
 $(document).ready(function() {
            $('#teras').DataTable({
                order: [[0, 'desc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                searching: false,
            });
        });
</script>

<div class="card h-100">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-3">
                {{ __('Detail Data Shift') }}
            </div>
        </div>
    </div>
    <div class="card-body">
        @foreach ($data as $dt)
        <div class="row">
            <div class="col-sm-2">
                Tanggal
            </div>
            <div class="col-sm-3">
                {{date('d F Y', strtotime($dt->tanggal))}}
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                Departement
            </div>
            <div class="col-sm-3">
                {{$dt->departement}}
            </div>
        </div>
        <br>
        @endforeach
        <br>
                @foreach ($data as $dt)
        <table id="teras" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Shift 1 (<b>{{$dt->shift1}}</b>)</th>
                    <th>Long Shift 1 (<b>{{$dt->longshift1}}</b>)</th>
                    <th>Shift 2 (<b>{{$dt->shift2}}</b>)</th>
                    <th>Long Shift 2 (<b>{{$dt->longshift2}}</b>)</th>
                    <th>Shift 3 (<b>{{$dt->shift3}}</b>)</th>
                </tr>
            </thead>
            @if (date('Y-m-d') < date('Y-m-d',(strtotime ( '-2 day' , strtotime ($dt->tanggal) ) ))) 

            <tbody>
            @for ($i = 0; $i < count($union); $i++)
                <tr>
                    <td>{{$union[$i][0]}} @if ($union[$i][0] != "") <a class="btn btn-sm btn-xs btn-outline-danger" href="/marah/{{$union[$i][0]}}/shift1/{{$dt->id}}" role="button">x</a>@endif</td>
                    <td>{{$union[$i][1]}} @if ($union[$i][1] != "") <a class="btn btn-sm btn-xs btn-outline-danger" href="/marah/{{$union[$i][1]}}/shift1/{{$dt->id}}" role="button">x</a>@endif</td>
                    <td>{{$union[$i][2]}} @if ($union[$i][2] != "") <a class="btn btn-sm btn-xs btn-outline-danger" href="/marah/{{$union[$i][2]}}/shift1/{{$dt->id}}" role="button">x</a>@endif</td>
                    <td>{{$union[$i][3]}} @if ($union[$i][3] != "") <a class="btn btn-sm btn-xs btn-outline-danger" href="/marah/{{$union[$i][3]}}/shift1/{{$dt->id}}" role="button">x</a>@endif</td>
                    <td>{{$union[$i][4]}} @if ($union[$i][4] != "") <a class="btn btn-sm btn-xs btn-outline-danger" href="/marah/{{$union[$i][4]}}/shift1/{{$dt->id}}" role="button">x</a>@endif</td>
                </tr>
            @endfor
            </tbody>
            @else
            <tbody>
            @for ($i = 0; $i < count($union); $i++)
                <tr>
                    <td>{{$union[$i][0]}}</td>
                    <td>{{$union[$i][1]}}</td>
                    <td>{{$union[$i][2]}}</td>
                    <td>{{$union[$i][3]}}</td>
                    <td>{{$union[$i][4]}}</td>
                </tr>
            @endfor
            </tbody>
            @endif
        </table>
                @endforeach
    </div>
</div>
</div>
</div>

@endsection