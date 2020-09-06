@extends('layouts.home')

@section('content')
<div class="card h-100">
    <div class="card-header">
        {{ __('Tambah Makanan') }}
    </div>
    <div class="card-body">
        <form action="simpan" method="post" enctype="multipart/form-data">
        @csrf
            <!-- Nama Makanan -->
            <div class="row">
                <div class="col-sm-2">
                    Nama Makanan
                </div>
                <div class="col-sm-4">
                    <input id="nama" type="text" class="form-control" name="nama" value="{{ old('nama') }}" required autofocus>
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-2">
                    <input type="submit" class="form-control btn btn-success" value="Simpan" required autofocus>
                </div>
            </div>
            <br>
            <!-- Jenis Makanan -->
            <div class="row">
                <div class="col-sm-2">
                    Jenis Makanan
                </div>
                <div class="col-sm-4">
                <select name="jenis" class="custom-select">
                        <option value="Ikan">Ikan</option>
                        <option value="Ayam">Ayam</option>
                        <option value="Daging">Daging</option>
                        <option value="Sarapan">Sarapan</option>
                    </select>
                </div>
            </div>
            <br>
            <!-- Harga -->
            <div class="row">
                <div class="col-sm-2">
                    Harga
                </div>
                <div class="col-sm-4">
                <input id="harga" type="number" class="form-control" name="harga" value="{{ old('harga') }}" required autofocus>
                </div>
            </div>
            <br>
            <!-- Gambar -->
            <div class="row">
                <div class="col-sm-2">
                    Gambar
                </div>
                <div class="col-sm-4">
                <input type="file" required class="form-control" accept="image/*" id="file" name="file">
                </div>
            </div>
            <br>
        </form>
    </div>

</div>
</div>
</div>

@endsection