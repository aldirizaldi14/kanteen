@extends('layouts.app')

@section('content')
<div class="container">
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
                                <th>Karyawan</th> <th>NIK</th>
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
                                <th>Karyawan</th> <th>NIK</th>
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
                                <th>Karyawan</th> <th>NIK</th>
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
            $('#example1').DataTable({
                scrollY: "300px",
                searching : false,
                scrollCollapse: true,
                paging: false,
                info: false,
                processing: true,
                serverSide: true,
                ajax: "/server_side/scripts/device1",
                columns: [
                    { data: 'name'},
                    { data: 'nik'},
                ]
            });
            $('#example2').DataTable({
                scrollY: "300px",
                searching : false,
                scrollCollapse: true,
                paging: false,
                info: false,
                processing: true,
                serverSide: true,
                ajax: "/server_side/scripts/device2",
                columns: [
                    { data: 'name'},
                    { data: 'nik'},
                ]
            });
            $('#example3').DataTable({
                scrollY: "300px",
                searching : false,
                scrollCollapse: true,
                paging: false,
                info: false,
                processing: true,
                serverSide: true,
                ajax: "/server_side/scripts/device3",
                columns: [
                    { data: 'name'},
                    { data: 'nik'},
                ]
            });
});
//Auto refresh Datatables on specified milliseconds
setInterval(function(){
    $('#example1').DataTable().ajax.reload();
    $('#example2').DataTable().ajax.reload();
    $('#example3').DataTable().ajax.reload();
}, 20000);
</script>
@endpush