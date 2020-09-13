@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        <div class="row">
            <div class="col-sm-3">
                {{ __('Daftar Pengguna') }}
            </div>
            <div class="col-sm-9" align="right">
                <button type="button" class="btn btn-sm btn-outline-success" data-toggle="modal"
                    data-target="#exampleModal">
                    Tambah Pengguna
                </button>
            </div>
        </div>
    </div>
    <div class="card-body">
        @error('username')
        <div class="alert alert-danger">{{ $message }}</div>
        <br>
        @enderror
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>User</th>
                    <th>Departement</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $dt)
                <tr>
                    <td>{{$dt->name}}</td>
                    <td>{{$dt->username}}</td>
                    <td>{{$dt->departement}}</td>
                    <td><a class="btn btn-sm btn-outline-primary" href="/userpass/{{$dt->username}}"
                            role="button">Edit</a> <a class="btn btn-sm btn-outline-danger" href="/userminus/{{$dt->username}}"
                            role="button">Hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>

<!-- Modal -->
<!-- Button trigger modal -->

<!-- Modal -->
<form action="/usersimpan" method="post" onSubmit="return checkPassword(this)">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengguna</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    <!-- Nama -->
                    <div class="row">
                        <div class="col-sm-3">
                            Nama
                        </div>
                        <div class="col-sm-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"
                                required autofocus>
                        </div>
                    </div>
                    <br>
                    <!-- NIK -->
                    <div class="row">
                        <div class="col-sm-3">
                            Username
                        </div>
                        <div class="col-sm-6">
                            <input id="username" type="text" min="0" class="form-control" name="username"
                                value="{{ old('username') }}" required autofocus>
                        </div>
                    </div>
                    <br>
                    <!-- Dept -->
                    <div class="row">
                        <div class="col-sm-3">
                            Departement
                        </div>
                        <div class="col-sm-6">
                            <select id="departement" name="departement" class="custom-select" onchange="test()">
                                @foreach ($dept as $dp)
                                <option value="{{$dp->departement}}">{{$dp->departement}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <!-- NIK -->
                    <div class="row">
                        <div class="col-sm-3">
                            Password
                        </div>
                        <div class="col-sm-6">
                            <input id="password1" minlength="4" type="password" class="form-control" name="password1"
                                value="{{ old('password1') }}" required autofocus>
                        </div>
                    </div>
                    <br>
                    <!-- Images -->
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-6">
                            <input id="password2" minlength="4" type="password" class="form-control" name="password2"
                                value="{{ old('password2') }}" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <input type="submit" class="btn btn-success" value="Simpan">
                </div>
            </div>
        </div>
    </div>
</form>

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
    } else {
        return true;
    }
}
</script>

@endsection