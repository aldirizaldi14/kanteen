@extends('layouts.home')

@section('content')

@if ($status == 1)
<script>
$(document).ready(function() {
    $("#myModal").modal('show');
});
</script>
@else
@endif
            <div class="card h-100">
                <div class="card-header">
                    <div class="row">
                    <div class="col-sm-3">
                    {{ __('Data Shift') }}
                </div>    
                <div class="col-sm-9" align="right">
                <a class="btn btn-sm btn-outline-success" href="/settingshift" role="button">Setting Shift</a>
                </div>
                    </div>
                </div>
                <div class="card-body">
                <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Departement</th>
                <th>Shift 1</th>
                <th>Long Shift 1</th>
                <th>Shift 2</th>
                <th>Long Shift 2</th>
                <th>Shift 3</th>
                @can('isAdmin')
                <th></th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td><a class="link" href="/datashift/{{$dt->id}}" role="button">{{$dt->tanggal}}</a></td>
                <td>{{$dt->departement}}</td>
                <td>{{$dt->shift1}}</td>
                <td>{{$dt->longshift1}}</td>
                <td>{{$dt->shift2}}</td>
                <td>{{$dt->longshift2}}</td>
                <td>{{$dt->shift3}}</td>
                @can('isAdmin')
                <td>
                <a class="btn btn-sm btn-outline-primary" href="/datashifte/{{$dt->id}}" role="button">Edit</a>
                <a class="btn btn-sm btn-outline-danger" href="/datashiftm/{{$dt->id}}" role="button">Hapus</a>
                </td>
                @endcan
            </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>

    
<!-- Modal 1 -->
<div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
        <h5 class="modal-title">Dokumen Belum Selesai</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                    data-target="#myModal2" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
                <div class="modal-body">
                    <p>Terdapat Dokumen yang Belum selesai? <br><br>
                    Apakah Anda ingin melanjutkan?
                    </p>
                </div>
                <div class="modal-footer">
                <a href="/settingshift/go/{{$menuju}}" class="btn btn-success" role="button" aria-pressed="true">Ya</a>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" data-toggle="modal"
                    data-target="#myModal2">Tidak</button>
                </div>
            </div>
        </div>
    </div>
<!-- Modal 2 -->
    <div id="myModal2" class="modal fade" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
        <h5 class="modal-title">Peringatan</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal"
                    data-target="#myModal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
                <div class="modal-body">
                    <p>Jika Tidak Dilanjutkan Data Akan Dihapus, apakah anda yakin?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal" data-toggle="modal"
                    data-target="#myModal">Tidak</button>
                    <a href="/refresh/{{$menuju}}" style="color:#fff" class="btn btn-danger" role="button"
                                    aria-pressed="true">Ya</a>
                </div>
            </div>
        </div>
    </div>

@endsection