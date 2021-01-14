@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Row 1 -->
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card h-50" align="center">
                <div class="card-header">
                    <h4>{{$data1}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$ikang}}" class="img-fluid h-100" alt="No Image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_1">
                            {{$sisikan}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- br -->
            <div class="card">
                <div class="card-body">
                    <table id="example1" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">
                <h5>Status : <b id="msg1"></b></h5>
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card h-50" align="center">
                <div class="card-header">
                    <h4>{{$data2}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$ayamg}}" class="img-fluid h-100" alt="No Image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_2">
                            {{$sisayam}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- br -->
            <div class="card">
                <div class="card-body">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer" align="left">
                <h5>Status : <b id="msg2"></b></h5>
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card h-50" align="center">
                <div class="card-header">
                    <h4>{{$data3}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$gdaging}}" class="img-fluid h-100" alt="No Image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_3">
                            {{$sisdaging}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- br -->
            <div class="card">
                <div class="card-body">
                    <table id="example3" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Karyawan</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer" align="left">
                <h5>Status : <b id="msg3"></b></h5>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {

    refreshAt(07, 30, 05);
    refreshAt(13, 20, 05);
    refreshAt(17, 00, 05);
    refreshAt(02, 00, 05);

    $('#example1').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device1",
        columns: [{
                data: 'name'
            },
            {
                data: 'nik'
            },
        ]
    });
    $('#example2').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device2",
        columns: [{
                data: 'name'
            },
            {
                data: 'nik'
            },
        ]
    });
    $('#example3').DataTable({
        scrollY: "300px",
        searching: false,
        scrollCollapse: true,
        paging: false,
        info: false,
        processing: true,
        serverSide: true,
        ajax: "/server_side/scripts/device3",
        columns: [{
                data: 'name'
            },
            {
                data: 'nik'
            },
        ]
    });
});

function refreshAt(hours, minutes, seconds) {
    var now = new Date();
    var then = new Date();

    if (now.getHours() > hours ||
        (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() {
        window.location.reload(true);
    }, timeout);
}
</script>
<script>
var channel = Echo.channel('my-channel');
channel.listen('.jikan', function(data) {
    $("#jumlah_1").text(data.jikan);
    $('#example1').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg1").text("OK");
  }else {
    $("#msg1").text("Error");
  }
});
channel.listen('.jayam', function(data) {
    $("#Jumlah_2").text(data.jayam);
    $('#example2').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg2").text("OK");
  }else {
    $("#msg2").text("Error");
  }
});
channel.listen('.jaging', function(data) {
    $("#Jumlah_3").text(data.jaging);
    $('#example3').DataTable().ajax.reload();
    if (data.status == 1) {
    $("#msg3").text("OK");
  }else {
    $("#msg3").text("Error");
  }
});
</script>
@endpush