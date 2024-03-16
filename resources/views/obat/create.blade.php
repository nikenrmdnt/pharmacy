@extends('adminlte::page') 
@section('title', 'Tambah Obat') 
@section('content_header') 
<h1 class="m-0 text-dark">Tambah Obat</h1> 
@stop
@section('content') 
<form action="{{route('obat.store')}}"  method="post"> 
    @csrf
    <div class="row"> 
        <div class="col-12"> 
            <div class="card"> 
                <div class="card-body"> 
                <div class="form-group"> 
                        <label for="kode_obat">Kode Obat</label> 
                            <input type="text" class="form-control 
                            @error('kode_obat') is-invalid @enderror" id="kode_obat"
                            placeholder="Masukkan Kode Obat" name="kode_obat" value="{{old('kode_obat')}}"> 
                            @error('kode_obat') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                    <div class="form-group"> 
                        <label for="nama_obat">Nama Obat</label> 
                        <input type="text" class="form-control 
                        @error('nama_obat') is-invalid @enderror" id="nama_obat"
                        placeholder="Nama Obat" name="nama_obat" value="{{old('nama_obat')}}"> 
                        @error('nama_obat') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group"> 
                        <label for="merk">Merk</label> 
                            <input type="text" class="form-control 
                            @error('merk') is-invalid @enderror" id="merk"
                            placeholder="Masukkan merk" name="merk" value="{{old('merk')}}"> 
                            @error('merk') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="jenis">Jenis Obat</label> 
                            <input type="text" class="form-control 
                            @error('jenis') is-invalid @enderror" id="jenis"
                            placeholder="Jenis" name="jenis"> 
                            @error('jenis') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="satuan">Satuan Obat</label> 
                            <input type="text" class="form-control 
                            @error('satuan') is-invalid @enderror" id="satuan"
                            placeholder="Satuan" name="satuan"> 
                            @error('satuan') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="golongan">Golongan Obat</label> 
                            <input type="text" class="form-control 
                            @error('golongan') is-invalid @enderror" id="golongan"
                            placeholder="Golongan" name="golongan"> 
                            @error('golongan') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="kemasan">Kemasan Obat</label> 
                            <input type="text" class="form-control 
                            @error('kemasan') is-invalid @enderror" id="kemasan"
                            placeholder="Kemasan" name="kemasan"> 
                            @error('kemasan') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="harga_jual">Harga Jual</label> 
                            <input type="number" class="form-control 
                            @error('harga_jual') is-invalid @enderror" id="harga_jual" value="0" readonly
                            placeholder="Harga Jual" name="harga_jual"> 
                            @error('harga_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="stock">Stock</label> 
                            <input type="number" class="form-control 
                            @error('stock') is-invalid @enderror" id="stock" value="0" readonly
                            placeholder="stock" name="stock"> 
                            @error('stock') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                    <div class="card-footer"> 
                        <button type="submit" class="btn btn-primary">Simpan</button> 
                        <a href="{{route('users.index')}}" class="btn btn-default"> 
                            Batal
                        </a> 
                    </div> 
                </div> 
            </div> 
        </div> 
@stop