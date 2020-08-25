@extends('layouts.home')

@section('content')
            <div class="card h-100">
                <div class="card-header">{{ __('Karyawan') }}</div>
                <div class="card-body">
                <table id="table_id" class="display table">
    <thead>
        <tr>
            <th>NIK</th>
            <th>NAMA</th>
            <th>Departement</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>$000</td>
            <td>$NAMA</td>
            <td>$DEPT</td>
        </tr>
        <tr>
        <td>$001</td>
            <td>$NAMA</td>
            <td>$DEPT</td>
        </tr>
    </tbody>
</table> 
                </div>
            </div>
        </div>
    </div>

@endsection