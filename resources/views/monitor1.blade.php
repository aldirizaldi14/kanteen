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
                <img src="/fimages/{{$ikang}}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
                
  </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card h-100"  align="center">
                <div class="card-header">
                    <h4>{{$data2}}</h4>
                </div>
                <div class="card-body">
                    <img src="/fimages/{{$ayamg}}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
                
  </div>
            </div>
        </div>
        <!-- colom 3 -->
        <div class="col-sm-4">
            <div class="card h-100"  align="center">
                <div class="card-header">
                    <h4>{{$data3}}</h4>
                </div>
                <div class="card-body">
                <img src="/fimages/{{$gdaging}}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
  </div>
            </div>
        </div>
    </div>

</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    refreshAt(07,30,05);
    refreshAt(13,20,05);
    refreshAt(17,00,05);
    refreshAt(02,00,05);
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

setInterval(function(){
    $('#example1').DataTable().ajax.reload();
}, 20000);
</script>
@endpush