@extends('layouts.home')

@section('content')

<script>
$(document).ready(function() {
    $('#teras').DataTable({
        order: [
            [0, 'asc']
        ],
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
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">Tanggal</div>
                    <div class="col-md-3">Departement</div>
                </div>
                <div class="row">
                    <div class="col-md-3"><b>{{date('d F Y', strtotime($tanggal))}}</b></div>
                    <div class="col-md-3"><b>{{$dept}}</b></div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3">Shift 1</div>
                    <div class="col-md-3">Shift 2</div>
                    <div class="col-md-3">Shift 3</div>
                </div>
                @foreach ($data as $dt)
                <div class="row">
                    <div class="col-md-3"><b>{{$dt->shift1}}</b></div>
                    <div class="col-md-3"><b>{{$dt->shift2}}</b></div>
                    <div class="col-md-3"><b>{{$dt->shift3}}</b></div>
                </div>
                @endforeach
                <br>

                <table id="teras" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nik Karyawan</th>
                            <th>Nama Karyawan</th>
                            <th>Shift</th>
                            <th>Status</th>
                            <th></th>
                        </tr>

                    </thead>
                    <tbody>
                        @foreach ($daftar as $df)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$df->nik}}</td>
                            <td>{{$df->name}}</td>
                            <td>{{ucwords($df->shift)}}</td>
                            <td>@if ($df->status == 0) Belum Ambil Makan @else Ambil Makan @endif</td>
                            @if (date('Y-m-d') < date('Y-m-d',(strtotime ( '-2 day' , strtotime ($dt->tanggal)))))
                                <td>
                                <a class="btn btn-sm btn-outline-primary" href="/rubahe/{{$dt->id}}" role="button">Edit</a>
                                <a class="btn btn-sm btn-outline-danger" href="/marahe/{{$dt->id}}" role="button">Hapus</a>
                                </td>
                                @else
                                <td>
                                <button class="btn btn-sm btn-outline-primary" href="#" disabled role="button">Edit</button>
                                <button class="btn btn-sm btn-outline-danger" href="#" disabled role="button">Hapus</button>
                                </td>
                                @endif
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

@endsection