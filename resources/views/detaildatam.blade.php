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
    <div class="row">
    @if ($dt->waktu == 'Shift1')
    <div class="col-sm-1"></div>
    <div class="col-sm-2">{{$dt->snack1}}</div> 
    <div class="col-sm-2">{{$dt->snack2}}</div>
    <div class="col-sm-2">{{$dt->makanan1}}</div>
    <div class="col-sm-2">{{$dt->makanan2}}</div>
    <div class="col-sm-2">{{$dt->makanan3}}</div>
    @else 
    <div class="col-sm-1"></div>
    <div class="col-sm-2"></div> 
    <div class="col-sm-2"></div>
    <div class="col-sm-2">{{$dt->makanan1}}</div>
    <div class="col-sm-2">{{$dt->makanan2}}</div>
    <div class="col-sm-2">{{$dt->makanan3}}</div>
    @endif
    @endforeach
    </div>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-2">
                <!-- Table 1 -->
                <table id="data" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sarapan 1</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data1 as $dt1)
                        <tr>
                            <td>{{$dt1->nik}} {{$dt1->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2">
                <!-- Table 2 -->
                <table id="data" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sarapan 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data2 as $dt2)
                        <tr>
                            <td>{{$dt2->nik}} {{$dt2->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2">
                <!-- Table 3 -->
                <table id="data" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Menu 1</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data3 as $dt3)
                        <tr>
                            <td>{{$dt3->nik}} {{$dt3->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2">
                <!-- Table 4 -->
                <table id="data" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Menu 2</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data4 as $dt4)
                        <tr>
                            <td>{{$dt4->nik}} {{$dt4->name}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-sm-2">
                <!-- Table 5 -->
                <table id="data" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Menu 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data5 as $dt5)
                        <tr>
                            <td>{{$dt5->nik}} {{$dt5->name}}</td>
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
<script>
        $(document).ready(function() {
            $('table.display').DataTable({
                order: [[0, 'desc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                searching: false
            });
        });
    </script>

@endsection