@extends('layouts.home2')

@section('content')
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Karyawan') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/karyawan/plus" role="button">Tambah Karyawan</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="karyawan" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>RFID</th>
                <th>NIK</th>
                <th>Nama</th>
                <th>Deptartemen</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
            <td>{{$i++}}</td>
            <td>{{$dt->rfid}}</td>
                <td>{{$dt->nik}}</td>
                <td>{{$dt->name}}</td>
                <td>@if ($dt->departemen == 'Other') {{$dt->departemen}} ({{$dt->remark}}) @else {{$dt->departemen}} @endif</td>
                <td><a class="btn btn-sm btn-outline-success" href="/karyawan/alter/{{$dt->nik}}" role="button">Edit</a> 
                    <a class="btn btn-sm btn-outline-danger" href="/karyawan/minus/{{$dt->nik}}" role="button">Hapus</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#karyawan').DataTable({
                order: [[0, 'asc']],
                scrollY: '50vh',
                scrollX: true,
                scrollCollapse: true,
                paging: false,
                info: false,
                dom: 'Bfrtip',
                buttons: [
                    'excelHtml5',
                ]
            });
        });
    </script>

@endpush