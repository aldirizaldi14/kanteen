@extends('layouts.app')

@section('content')
<div class="container" align="center">
    <div class="row">
        <div class="col-sm-12 mx-auto">
            <img src="{{ asset('images/loading.jpg') }}" class="img-fluid" alt="Responsive image">
        </div>
    </div>

</div>
@stop

@push('scripts')
<script>
$(document).ready(function() {
    refreshAt(05, 30, 05);
    refreshAt(11, 05, 05);
    refreshAt(17, 05, 05);
    refreshAt(02, 05, 05);
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
setInterval(function() {
    if (new Date().getHours() == 6) {
        location.reload();
    } else if (new Date().getHours() == 11) {
        location.reload();
    } else if (new Date().getHours() == 17) {
        location.reload();
    } else if (new Date().getHours() == 2) {
        location.reload();
    }
}, 30000);
</script>
@endpush