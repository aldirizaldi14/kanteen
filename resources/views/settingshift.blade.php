@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Pengaturan Makan') }}</div>
    <div class="card-body">
        <form action="/simpan" method="post">
        @csrf
        <!-- Departement -->
        <div class="row">
        <div class="col-sm-2"> Departement</div>
        <div class="col-sm-4">
        <select name="departement" id="departement" class="selectpicker w-100">
        @foreach ($dept as $dp)
        <option value="@if ($dp->departemen == 'Other') {{$dp->departemen}} ({{$dp->remark}}) @else {{$dp->departemen}} @endif">@if ($dp->departemen == 'Other') {{$dp->departemen}} ({{$dp->remark}}) @else {{$dp->departemen}} @endif</option>
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
        <input type="number" class="form-control w-100" required name="jshift1" placeholder="Shift 1" value="{{old('jshift1')}}">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" required name="jlshift1" placeholder="Long Shift 1" value="{{old('jlshift1')}}">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" required name="jshift2" placeholder="Shift 2" value="{{old('jshift2')}}">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" required name="jlshift2" placeholder="Long Shift 2" value="{{old('jlshift2')}}">
        </div>
        <div class="col-sm-2">
        <input type="number" class="form-control w-100" required name="jshift3" placeholder="Shift 3" value="{{old('jshift3')}}">
        </div>
        </div>
        <br>
        <!-- Remark -->
        <div class="row">
        <div class="col-sm-2">Remark</div>
        <div class="col-sm-6">
        <input type="text" class="form-control w-100" required name="remark" placeholder="Remark" value="{{old('remark')}}">
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