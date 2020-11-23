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
                <div id="body_1" class="card-body">
                    <div class="row">
                    <img id="img_1" src="/kimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
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
                <div id="body_2" class="card-body">
                <div class="row">
                    <img id="img_2" src="/kimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
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
                <div id="body_3" class="card-body">
                <div class="row">
                    <img id="img_3" src="/kimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
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
channel.listen('.ikan', function(data) {
  $("#name_1").text(": " + data.nama);
  $("#id_1").text(": " + data.nik);
  $("#dept_1").text(": " + data.departement);
  $("#img_1").attr("src", "/kimages/" + data.image); 
  if (data.status == 0) {
    $("#body_1").css("background-color", "lightgreen");
  }else {
    $("#body_1").css("background-color", "red");
  }
});
channel.listen('.ayam', function(data) {
  $("#name_2").text(": " + data.nama);
  $("#id_2").text(": " + data.nik);
  $("#dept_2").text(": " + data.departement);
  $("#img_2").attr("src", "/kimages/" + data.image);
  if (data.status == 0) {
    $("#body_2").css("background-color", "lightgreen");
  }else {
    $("#body_2").css("background-color", "red");
  }
});
channel.listen('.daging', function(data) {
  $("#name_3").text(": " + data.nama);
  $("#id_3").text(": " + data.nik);
  $("#dept_3").text(": " + data.departement);
  $("#img_3").attr("src", "/kimages/" + data.image);
  if (data.status == 0) {
    $("#body_3").css("background-color", "lightgreen");
  }else {
    $("#body_3").css("background-color", "red");
  }
});
</script>
@endpush