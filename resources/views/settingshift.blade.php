@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Pengaturan Makan') }}</div>
    <div class="card-body">
        <form action="/settingshift/simpan" method="post">
        @csrf
        <!-- Departement -->
        <div class="row">
        <div class="col-sm-2"> Departement</div>
        <div class="col-sm-4">
        <select name="departement" id="departement" data-live-search="true" class="selectpicker w-100">
        @foreach ($dept as $dp)
        <option value="{{$dp->departement}}">{{$dp->departement}}</option>
        @endforeach
        </select>
        </div>
        </div>
        <br>
        <!-- Jumlah Karyawan -->
        <div class="row">
        <div class="col-sm-2">Tanggal</div>
        <div class="col-sm-3">
        <input type="date" class="form-control w-100" name="tanggal" required>
        </div>
        </div>
        <br>
        <!-- Jumlah Karyawan -->
        <div class="row">
        <div class="col-sm-2">Jumlah Karyawan</div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" min="0" name="jshift1" placeholder="Shift 1" value="0">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" min="0" name="jlshift1" placeholder="Long Shift 1" value="0">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" min="0" name="jshift2" placeholder="Shift 2" value="0">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" min="0" name="jlshift2" placeholder="Long Shift 2" value="0">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" min="0" name="jshift3" placeholder="Shift 3" value="0">
        </div>
        </div>
        <br>
        <!-- Remark -->
        <div class="row">
        <div class="col-sm-2">Remark</div>
        <div class="col-sm-6">
        <input type="text" class="form-control w-100" name="remark" placeholder="Remark" value="-">
        </div>
        </div>
        <br>
        <!-- Submit -->
        <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-2">
        <input type="submit" class="form-controll btn btn-success w-100" value="Submit">
        </div>
        </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection