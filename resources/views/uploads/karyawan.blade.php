@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">{{ __('Data Upload Karyawan') }}</div>
    <div class="card-body">
        <form action="/excel/uploadkaryawan" method="post" enctype="multipart/form-data">
            @csrf
            <!-- Departement -->
            <div class="row">
            <div class="col-sm-12">
            <p>Upload data karyawan, mohon untuk menggunakan kaidah format yang telah tersedia.</p>
            <p>Untuk contoh kaidah bisa anda unduh di tautan <a href="{{ asset('/temp/Karyawan.xlsx') }}">berikut ini.</a></p>
            <br>
            <p>NB: Foto Pada Karyawan Tidak dapat dikutkan dalam proses ini.</p>
            </div>
            </div>
            <br>
            <!-- Jumlah Karyawan -->
            <div class="row">
                <div class="col-sm-2">Upload File</div>
                <div class="col-sm-5">
                <input type="file" required class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" id="file" name="file">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-controll btn btn-success w-100" value="Submit">
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-sm-12">
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
            @endif
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>

@endsection