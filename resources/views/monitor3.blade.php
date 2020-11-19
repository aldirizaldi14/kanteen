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
                    <img src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div class="col-sm-8">: </div>
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
                    <img src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div class="col-sm-8">: </div>
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
                    <img src="/fimages/Dummy.jpg" class="img-fluid" alt="Responsive image" >
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nama</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Nik</div>
                    <div class="col-sm-8">: </div>
                    </div>
                    <div class="row">
                    <div class="col-sm-4">Departement</div>
                    <div class="col-sm-8">: </div>
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
});
</script>
@endpush