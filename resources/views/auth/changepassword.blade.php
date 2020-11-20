@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Rubah Password') }}
    </div>
    <div class="card-body">
    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error)
                        <small @if ($error=="Password Berhasil Dirubah") style="color:#7bc043" @else style="color:#fe4a49" @endif class="form-text"><strong>{{$error}}</strong></small>
    <br>
                        @endforeach
                        @endif
        <form action="/passchange" method="post" onSubmit="return checkPassword(this)">
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
                    <input type="password" class="form-control" id="password1" name="password1" required autofocus>
                </div>
            </div>
            <br>
            <!-- Images -->
            <div class="row">
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                <input type="password" class="form-control" id="password2" name="password2" required autofocus>
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

<script>
function checkPassword(form) {
    password1 = form.password1.value;
    password2 = form.password2.value;
    if (password1 == '')
        alert("Please enter Password");
    else if (password2 == '')
        alert("Please enter confirm password");
    else if (password1 != password2) {
        alert("\nPassword did not match: Please try again...")
        return false;
    }
    else {
        return true;
    }
}
</script>

@endsection