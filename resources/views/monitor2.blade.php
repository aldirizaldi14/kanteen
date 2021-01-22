@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" align="center">
                    Ikan
                </div>
                <div id="body_1" class="card-body">
                    <div class="row">
                    <img id="img_1" src="/kimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row texts1" style="font-size:150%">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_1" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts1" style="font-size:150%">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_1" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts1" style="font-size:150%">
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
                <div class="card-header" align="center">
                    Ayam
                </div>
                <div id="body_2" class="card-body">
                <div class="row">
                    <img id="img_2" src="/kimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row texts2" style="font-size:150%">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_2" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts2" style="font-size:150%">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_2" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts2" style="font-size:150%">
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
                    <div class="row texts3" style="font-size:150%">
                    <div class="col-sm-4">Nama</div>
                    <div id="name_3" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts3" style="font-size:150%">
                    <div class="col-sm-4">Nik</div>
                    <div id="id_3" class="col-sm-8">: </div>
                    </div>
                    <div class="row texts3" style="font-size:150%">
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
$(document).ready(function() {

    refreshAt(07, 30, 05);
    refreshAt(13, 20, 05);
    refreshAt(18, 45, 05);
    refreshAt(03, 10, 05);

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
setInterval(function() {
    if (new Date().getHours() == 7 && new Date().getMinutes() > 30) {
        location.reload()
    } else if (new Date().getHours() == 13 && new Date().getMinutes() > 25) {
        location.reload()
    } else if (new Date().getHours() == 17 && new Date().getMinutes() > 45) {
        location.reload()
    } else if (new Date().getHours() == 3 && new Date().getMinutes() > 10) {
        location.reload()
    }
}, 30000);
</script>
<script>
var channel = Echo.channel('my-channel');
channel.listen('.ikan', function(data) {
  $(".texts1").css("color", "white");
  $("#name_1").text(": " + data.nama);
  $("#id_1").text(": " + data.nik);
  $("#dept_1").text(": " + data.departement);
  $("#img_1").attr("src", "/kimages/" + data.image); 
  if (data.status == 1) {
    $("#body_1").css("background-color", "lightgreen");
  }else {
    $("#body_1").css("background-color", "red");
  }
});
channel.listen('.ayam', function(data) {
  $(".texts2").css("color", "white");
  $("#name_2").text(": " + data.nama);
  $("#id_2").text(": " + data.nik);
  $("#dept_2").text(": " + data.departement);
  $("#img_2").attr("src", "/kimages/" + data.image);
  if (data.status == 1) {
    $("#body_2").css("background-color", "lightgreen");
  }else {
    $("#body_2").css("background-color", "red");
  }
});
channel.listen('.daging', function(data) {
  $(".texts3").css("color", "white");
  $("#name_3").text(": " + data.nama);
  $("#id_3").text(": " + data.nik);
  $("#dept_3").text(": " + data.departement);
  $("#img_3").attr("src", "/kimages/" + data.image);
  if (data.status == 1) {
    $("#body_3").css("background-color", "lightgreen");
  }else {
    $("#body_3").css("background-color", "red");
  }
});
</script>
@endpush