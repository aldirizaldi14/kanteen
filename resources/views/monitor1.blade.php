@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card h-100" align="center">
                <div class="card-header">
                    <h4>{{$data1}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$ikang}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_1">
                            {{$sisikan}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card h-100" align="center">
                <div class="card-header">
                    <h4>{{$data2}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$ayamg}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_2">
                            {{$sisayam}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card h-100" align="center">
                <div class="card-header">
                    <h4>{{$data3}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$gdaging}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-12" id="jumlah_3">
                            {{$sisdaging}}
                        </div>
                    </div>
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
});
channel.listen('.jayam', function(data) {
    $("#Jumlah_2").text(data.jayam);
});
channel.listen('.jaging', function(data) {
    $("#Jumlah_3").text(data.jaging);
});
</script>
@endpush