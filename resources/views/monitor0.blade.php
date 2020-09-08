@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <div class="card">
                <div class="card-body" align="center">
                <img src="{{ asset('images/loading.jpg') }}" class="img-fluid" alt="Responsive image" >
                </div>
            </div>
        </div>
    </div>

</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    refreshAt(06,00,05);
    refreshAt(11,00,05);
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
</script>
@endpush