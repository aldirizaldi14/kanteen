@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Edit Makanan') }}
    </div>
    <div class="card-body">
        @foreach ($data as $dt)
        <form action="simpan" method="post" enctype="multipart/form-data">
        @csrf
        <input hidden type="text" class="form-control" name="id" value="{{$dt->idm}}" autofocus>
        <div class="row">
            <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-4">
                    Nama Makanan
                </div>
                <div class="col-sm-8">
                    <input id="nama" type="text" class="form-control" name="nama" value="{{$dt->nama}}" required autofocus>
                </div>             
            </div>
            <br>
            <!-- Jenis Makanan -->
            <div class="row">
                <div class="col-sm-4">
                    Jenis Makanan
                </div>
                <div class="col-sm-8">
                <select name="jenis" class="custom-select">
                        <option value="Ikan">Ikan</option>
                        <option value="Ayam">Ayam</option>
                        <option value="Daging">Daging</option>
                        <option value="Spesial">Spesial</option>
                        <option value="Sarapan">Sarapan</option>
                    </select>
                </div>
            </div>
            <br>
            <!-- Harga -->
            <div class="row">
                <div class="col-sm-4">
                    Harga
                </div>
                <div class="col-sm-8">
                <input id="harga" type="number" class="form-control" name="harga" value="{{$dt->harga}}" required autofocus>
                </div>
            </div>
            <br>
            <!-- Gambar -->
            <div class="row">
                <div class="col-sm-4">
                    Gambar
                </div>
                <div class="col-sm-8">
                <input type="file" class="form-control" accept="image/*" id="file" name="file">
                </div>
            </div>
            </div>
            <!-- Div Dua -->
            <div class="col-sm-6">
            <div class="row">
            <div class="col-sm-4">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" autofocus>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-8">
                    <img src="/fimages/{{$dt->gambar}}" class="img-fluid" alt="">
                </div>
            </div>
            </div>
        </div>
            
        </form>
        @endforeach
    </div>
</div>
</div>
</div>

@endsection