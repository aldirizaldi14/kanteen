@extends('layouts.home')

@section('content')

<script>
 $(document).ready(function() {
            $('#teras').DataTable({
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
        <table id="teras" class="display" style="width:100%">
            <thead>
                @foreach ($data as $dt)
                <tr>
                    <th>Shift 1 (<b>{{$dt->shift1}}</b>)</th>
                    <th>Long Shift 1 (<b>{{$dt->longshift1}}</b>)</th>
                    <th>Shift 2 (<b>{{$dt->shift2}}</b>)</th>
                    <th>Long Shift 2 (<b>{{$dt->longshift2}}</b>)</th>
                    <th>Shift 3 (<b>{{$dt->shift3}}</b>)</th>
                </tr>
                @endforeach
            </thead>
            <tbody>
                <tr>
                    <td class="align-top">
                        <table class="w-100">
                            @foreach ($data1 as $dt1)
                            <tr>
                                <td>{{$dt1->name}} </td>
                                <td> <a class="btn btn-sm btn-outline-danger" href="/datashiftmk/{{$dt1->id}}" role="button">Hapus</a></td>
                            </tr>
                            @endforeach
                        </table>
                    </td>
                <td class="align-top">
                <table class="w-100">
                @foreach ($data2 as $dt2)
                <tr>
                    <td>{{$dt2->name}}</td>
                    <td><a class="btn btn-sm btn-outline-danger" href="/datashiftmk/{{$dt2->id}}" role="button">Hapus</a></td>
                </tr>
                @endforeach
                </table>
                </td>
                <td  class="align-top">
                    <table class="w-100">
                    @foreach ($data3 as $dt3)
                    <tr>
                        <td>{{$dt3->name}} </td>
                        <td><a class="btn btn-sm btn-outline-danger" href="/datashiftmk/{{$dt3->id}}" role="button">Hapus</a></td>
                    </tr>
                    @endforeach
                    </table>
                </td>
                <td  class="align-top">
                    <table class="w-100">
                    @foreach ($data4 as $dt4)
                    <tr>
                        <td>{{$dt4->name}}</td>
                        <td><a class="btn btn-sm btn-outline-danger" href="/datashiftmk/{{$dt4->id}}" role="button">Hapus</a></td>
                    </tr>
                    @endforeach
                    </table>
                </td>
                <td  class="align-top">
                    <table class="w-100">
                    @foreach ($data5 as $dt5)
                    <tr>
                        <td>{{$dt5->name}}
                        </td>
                        <td><a class="btn btn-sm btn-outline-danger" href="/datashiftmk/{{$dt5->id}}" role="button">Hapus</a></td>
                    </tr>
                    @endforeach
                    </table>
                </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

@endsection