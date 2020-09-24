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
                        <option value="{{$departement}}">{{$departement}}</option>
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
                    <input type="text" class="form-control w-100" name="remark" placeholder="Remark" value="{{$remark}}">
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-8"></div>
            <div class="col-sm-4" align="right">
            <input type="text" id="search" onkeyup="myFunction()" placeholder="Search">
            </div>
            </div>
            <br>
            <div class="row">
                <table id="input" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Karyawan</th>
                            <th align="center">Absen</th>
                            <th align="center">Shift 1</th>
                            <th align="center">Long Shift 1</th>
                            <th align="center">Shift 2</th>
                            <th align="center">Long Shift 2</th>
                            <th align="center">Shift 3</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $dt)
                        <tr>
                            <td>{{$i + 1}}</td>
                            <td hidden><input type="text" class="form-control w-100" name="nik{{$i}}" value="{{$dt->nik}}"></td>
                            <td>{{$dt->name}}</td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}" value="none" checked></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}" value="shift1"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}" value="longshift1"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}" value="shift2"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i}}" value="longshift2"></td>
                            <td align="center"><input class="form-check-input" type="radio" name="shift{{$i++}}" value="shift3"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
</div>
</div>
</div>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("search");
  filter = input.value.toUpperCase();
  table = document.getElementById("input");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

@endsection