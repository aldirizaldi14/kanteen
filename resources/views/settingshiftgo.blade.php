@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Pengaturan Makan') }}</div>
    <div class="card-body">
        <form action="/settingshift/goes" method="post">
            @csrf
            <!-- Departement -->
            @foreach ($data as $dt)
            <input type="text" value="{{$dt->id}}" name="id" hidden>
            <div class="row">
                <div class="col-sm-2"> Departement</div>
                <div class="col-sm-4">
                    <select name="departement" data-live-search="true" id="departement" class="selectpicker w-100">
                        @foreach ($dept as $dp)
                        <option value="{{$dp->departement}}">{{$dp->departement}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3">
                    <input type="date" class="form-control w-100" name="tanggal" value="{{$dt->tanggal}}" required>
                </div>
            </div>
            <br>
            <!-- Remark -->
            <div class="row">
                <div class="col-sm-2">Remark</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control w-100" required name="remark" placeholder="Remark" value="{{$dt->remark}}">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-controll btn btn-success w-100" name="tombol" value="Rubah">
                </div>
            </div>
            <br>
            <!-- Jumlah Karyawan -->
            <div class="row">
                <div class="col-sm-2">Jumlah Karyawan</div>
                <div class="col-sm-2">
                    <input type="number" class="form-control w-100" required name="jshift1" placeholder="Shift 1" value="{{$dt->shift1}}">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control w-100" required name="jlshift1" placeholder="Long Shift 1" value="{{$dt->longshift1}}">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control w-100" required name="jshift2" placeholder="Shift 2" value="{{$dt->shift2}}">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control w-100" required name="jlshift2" placeholder="Long Shift 2" value="{{$dt->longshift2}}">
                </div>
                <div class="col-sm-2">
                    <input type="number" class="form-control w-100" required name="jshift3" placeholder="Shift 3" value="{{$dt->shift3}}">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    @for ($i = 0; $i < $dt->shift1; $i++)
                    <div class="row">
                            <select name="shift1[]" data-live-search="true" id="shift1" class="selectpicker w-100">
                                @foreach ($kary as $ky)
                                <option value="{{$ky->nik}}">{{$ky->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        @endfor
                </div>
                <div class="col-sm-2">
                    @for ($i = 0; $i < $dt->longshift1; $i++)
                    <div class="row">
                            <select name="longshift1[]" data-live-search="true" id="longshift1" class="selectpicker w-100">
                                @foreach ($kary as $ky)
                                <option value="{{$ky->nik}}">{{$ky->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        @endfor
                </div>
                <div class="col-sm-2">
                    @for ($i = 0; $i < $dt->shift2; $i++)
                    <div class="row">
                            <select name="shift2[]" data-live-search="true" id="shift2" class="selectpicker w-100">
                                @foreach ($kary as $ky)
                                <option value="{{$ky->nik}}">{{$ky->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        @endfor
                </div>
                <div class="col-sm-2">
                    @for ($i = 0; $i < $dt->longshift2; $i++)
                    <div class="row">
                            <select name="longshift2[]" data-live-search="true" id="longshift2" class="selectpicker w-100">
                                @foreach ($kary as $ky)
                                <option value="{{$ky->nik}}">{{$ky->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        @endfor
                </div>
                <div class="col-sm-2">
                    @for ($i = 0; $i < $dt->shift3; $i++)
                        <div class="row">
                            <select name="shift3[]" data-live-search="true" id="shift3" class="selectpicker w-100">
                                @foreach ($kary as $ky)
                                <option value="{{$ky->nik}}">{{$ky->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        @endfor
                </div>
            </div>
            @endforeach
            <!-- Submit -->
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <input type="submit" class="form-controll btn btn-success w-100" name="tombol" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection