@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- colom 1 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" align="center">
                    Ikan
                </div>
                <div class="card-body">
                <img src="{{ asset('images/ikanasammanis.jpg') }}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
    Sisa 47 Piring
  </div>
            </div>
        </div>
        <!-- colom 2 -->
        <div class="col-sm-4">
            <div class="card">
                <div class="card-header" align="center">
                    Ayam
                </div>
                <div class="card-body">
                    <img src="{{ asset('images/ayambakar.jpg') }}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
    Sisa 18 Piring
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
                <img src="{{ asset('images/wagyu.jpg') }}" class="img-fluid" alt="Responsive image" >
                </div>
                <div class="card-footer">
    Sisa 3 Piring
  </div>
            </div>
        </div>
    </div>

</div>

@endsection