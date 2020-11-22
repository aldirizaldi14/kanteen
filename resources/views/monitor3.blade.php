@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Ikan
                </div>
                <div class="card-body">
                    <div class="row">
                    <img id="img_1" src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_1" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_1" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div id="dept_1" class="col-sm-8">: </div>
                    </div>
                </div>
                <div class="card-footer" align="left">
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    Ayam
                </div>
                <div class="card-body">
                <div class="row">
                    <img id="img_2" src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_2" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_2" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div id="dept_2" class="col-sm-8">: </div>
                    </div>
                </div>
                <div class="card-footer" align="left">
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" align="center">
                    Daging
                </div>
                <div class="card-body">
                <div class="row">
                    <img id="img_3" src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_3" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_3" class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div id="dept_3" class="col-sm-8">: </div>
                    </div>
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
var channel = Echo.channel('my-channel');
channel.listen('.my-event', function(data) {
  alert(JSON.stringify(data));
  $("#name_1").text(": " + "Hello world!");
  $("#id_1").text(": " + "Hello world!");
  $("#dept_1").text(": " + "Hello world!");
});
</script>
@endpush