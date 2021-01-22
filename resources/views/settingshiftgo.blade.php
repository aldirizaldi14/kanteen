@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Pengaturan Makan') }}</div>
    <div class="card-body">
        <form action="/settingshift/goes" method="post">
            @csrf
            <!-- Departement -->
            <div class="row">
                <div class="col-sm-2"> Departement</div>
                <div class="col-sm-3">
                    <select name="departement" id="departement" class="selectpicker w-100 disabled">
                        <option value="{{$costcenter}}">{{$departement}}</option>
                    </select>
                </div>
                <div class="col-sm-2"></div>
                <div class="col-sm-3"></div>
                <div class="col-sm-2"></div>
            </div>
            <br>
            <!-- Jumlah Karyawan -->
            <div class="row">
                <div class="col-sm-2">Tanggal</div>
                <div class="col-sm-3">
                    <input type="date" class="form-control w-100" name="tanggal" value="{{$tanggal}}" required>
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-controll btn btn-success w-100" value="Submit">
                </div>
            </div>
            <br>
            <!-- Remark -->
            <div class="row">
                <div class="col-sm-2">Remark</div>
                <div class="col-sm-6">
                    <input type="text" class="form-control w-100" name="remark" placeholder="Remark"
                        value="{{$remark}}">
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-12">
            
                <table id="input" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th hidden></th>
                            <th>Karyawan</th>
                            <th>Absen</th>
                            <th>Shift 1</th>
                            <th>Long Shift 1</th>
                            <th>Shift 2</th>
                            <th>Long Shift 2</th>
                            <th>Shift 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td hidden><input type="text" class="form-control w-100" name="nik{{$i}}"
                                    value="{{$dt->nik}}"></td>
                            <td>{{$dt->name}}</td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}"
                                    value="none" checked></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}"
                                    value="shift1"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}"
                                    value="longshift1"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}"
                                    value="shift2"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}"
                                    value="longshift2"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i++}}"
                                    value="shift3"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<script>
$(document).ready(function() {
    $('#input').DataTable({
        order: [
            [0, 'asc']
        ],
        scrollY: '50vh',
        scrollCollapse: true,
        paging: false,
        autowidth: true,
        info: false,
        columnDefs: [{
            orderable: false,
            targets: [3,4,5,6,7,8]
        }]
    });
});
</script>

@endsection