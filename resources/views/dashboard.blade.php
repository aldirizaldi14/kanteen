@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Dashboard') }}</div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-9">
                Menu Hari Ini
            </div>
            <div class="col-sm-3">
                Tanggal {{date('d-M-Y')}}
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-3" align="center">
            </div>
            <div class="col-sm-3" align="center">
                Shift 1
            </div>
            <div class="col-sm-3" align="center">
                Shift 2
            </div>
            <div class="col-sm-3" align="center">
                Shift 3
            </div>
        </div>
        <br>
        <!-- Snack -->
        <div class="row">
            <div class="col-sm-3" align="center">
                Snack
            </div>
            <div class="col-sm-3" align="center">
            $SNS1
            </div>
            <div class="col-sm-3" align="center">
            $SNS2
            </div>
            <div class="col-sm-3" align="center">
            $SNS3
            </div>
        </div>
        <br>
        <!-- Menu 1 -->
        <div class="row">
            <div class="col-sm-3" align="center">
                Menu 1
            </div>
            <div class="col-sm-3" align="center">
                $M1S1
            </div>
            <div class="col-sm-3" align="center">
            $M1S2
            </div>
            <div class="col-sm-3" align="center">
            $M1S3
            </div>
        </div>
        <br>
        <!-- Menu 2 -->
        <div class="row">
            <div class="col-sm-3" align="center">
                Menu 2
            </div>
            <div class="col-sm-3" align="center">
                $M2S1
            </div>
            <div class="col-sm-3" align="center">
            $M2S2
            </div>
            <div class="col-sm-3" align="center">
            $M2S3
            </div>
        </div>
        <br>
        <!-- Menu 3 -->
        <div class="row">
            <div class="col-sm-3" align="center">
                Menu 3
            </div>
            <div class="col-sm-3" align="center">
                $M3S1
            </div>
            <div class="col-sm-3" align="center">
            $M3S2
            </div>
            <div class="col-sm-3" align="center">
            $M3S3
            </div>
        </div>

    </div>
</div>
</div>
</div>
@endsection