@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4" align="center">
            <div class="card">
                <div class="card-header">
                    Ikan
                </div>
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
                <div class="card-footer" align="left">
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4" align="center">
            <div class="card">
                <div class="card-header">
                    Ayam
                </div>
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
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4" align="center">
            <div class="card">
                <div class="card-header" align="center">
                    Daging
                </div>
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

    if(now.getHours() > hours ||
       (now.getHours() == hours && now.getMinutes() > minutes) ||
        now.getHours() == hours && now.getMinutes() == minutes && now.getSeconds() >= seconds) {
        then.setDate(now.getDate() + 1);
    }
    then.setHours(hours);
    then.setMinutes(minutes);
    then.setSeconds(seconds);

    var timeout = (then.getTime() - now.getTime());
    setTimeout(function() { window.location.reload(true); }, timeout);
}

//Auto refresh Datatables on specified milliseconds
setInterval(function() {
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
}, 20000);
</script>
@endpush