@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Rubah Password') }}
    </div>
    <div class="card-body">
        <form action="simpan" method="post">
        @csrf
            <!-- Nama -->
            <div class="row">
                <div class="col-sm-2">
                    Password Lama
                </div>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="oldpassword" required autofocus>
                </div>
            </div>
            <br>
            <!-- NIK -->
            <div class="row">
                <div class="col-sm-2">
                    Password Baru
                </div>
                <div class="col-sm-4">
                    <input type="password" class="form-control" name="passwordnew" required autofocus>
                </div>
            </div>
            <br>
            <!-- Images -->
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                <input type="password" class="form-control" name="passwordconfirm" required autofocus>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <input type="submit" class="btn btn-outline-success w-100" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection