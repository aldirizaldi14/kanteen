@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        <table class="w-100">
            <tr>
                <td align="left">{{ __('Data Yang Makan')}}</td>
            </tr>
        </table>
    </div>
    <div class="card-body">
    <br>
    @foreach ($data as $dt)
    <div class="row">
    <div class="col-sm-1">Tanggal</div> 
    <div class="col-sm-2">{{$dt->tanggal}}</div>
    </div>
    <div class="row">
    <div class="col-sm-1">Shift</div>
    <div class="col-sm-2">{{$dt->waktu}}</div>
    </div>
    <br>
    <div class="row justify-content-center align-items-center">
    @if ($dt->waktu == 'Shift1')
    <div class="col-sm-12" align="center">
    <table>
    <tr>
    <td style="width:20%">{{$dt->snack1}}</td>
    <td style="width:20%">{{$dt->snack2}}</td>
    <td style="width:20%">{{$dt->makanan1}}</td>
    <td style="width:20%">{{$dt->makanan2}}</td>
    <td style="width:20%">{{$dt->makanan3}}</td>
    </tr>
    </table>
    </div>
    @else 
    <div class="col-sm-12" align="center">
    <table>
    <tr>
    <td style="width:20%"> </td>
    <td style="width:20%"> </td>
    <td style="width:20%">{{$dt->makanan1}}</td>
    <td style="width:20%">{{$dt->makanan2}}</td>
    <td style="width:20%">{{$dt->makanan3}}</td>
    </tr>
    </table>
    </div>
    @endif
    @endforeach
    </div>

    <div class="row justify-content-center align-items-center">
    <div class="col-sm-12">
    <table id="example1" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nik Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Jenis</th>
                            <th>Menu</th>
                            <th>Jam</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data1 as $dt1)
                        <tr>
                            <td>{{$dt1->nik}}</td>
                            <td>{{$dt1->name}}</td>
                            <td>Sarapan</td>
                            <td>{{$dt1->makanan}}</td>
                            <td>{{date('H:i:s', strtotime($dt1->time))}}</td>
                        </tr>
                        @endforeach
                        @foreach ($data2 as $dt2)
                        <tr>
                            <td>{{$dt2->nik}}</td>
                            <td>{{$dt2->name}}</td>
                            <td>Sarapan</td>
                            <td>{{$dt2->makanan}}</td>
                            <td>{{date('H:i:s', strtotime($dt2->time))}}</td>
                        </tr>
                        @endforeach
                        @foreach ($data3 as $dt3)
                        <tr>
                            <td>{{$dt3->nik}}</td>
                            <td>{{$dt3->name}}</td>
                            <td>Makan Berat</td>
                            <td>{{$dt3->makanan}}</td>
                            <td>{{date('H:i:s', strtotime($dt3->time))}}</td>
                        </tr>
                        @endforeach
                        @foreach ($data4 as $dt4)
                        <tr>
                            <td>{{$dt4->nik}}</td>
                            <td>{{$dt4->name}}</td>
                            <td>Makan Berat</td>
                            <td>{{$dt4->makanan}}</td>
                            <td>{{date('H:i:s', strtotime($dt4->time))}}</td>
                        </tr>
                        @endforeach
                        @foreach ($data5 as $dt5)
                        <tr>
                            <td>{{$dt5->nik}}</td>
                            <td>{{$dt5->name}}</td>
                            <td>Makan Berat</td>
                            <td>{{$dt5->makanan}}</td>
                            <td>{{date('H:i:s', strtotime($dt5->time))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
    </div>
    </div>
        </div>
    </div>
</div>
</div>
</div>
<script>
        $(document).ready(function() {
            $('#example1').DataTable({
                order: [[0, 'desc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                searching: true,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                ]
            });
        });
    </script>

@endsection