@extends('adminlte::page')
@section('title', 'Edit Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Edit Penjualan</h1>
@stop
@section('content')
    <form action="{{route('penjualan.update', $penjualan)}}" method="post">
        @method('PUT')
        @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="form-group"> 
                        <label for="nonota_jual">No. Nota Penjualan</label> 
                        <input type="text" class="form-control 
                        @error('nonota_jual') is-invalid @enderror" id="nonota_jual"
                        placeholder="Nomor Nota" name="nonota_jual" value="{{$penjualan->nonota_jual ?? old('nonota_jual')}}"> 
                        @error('nonota_jual') <span class="text-danger">{{$message}}</span> @enderror
                    </div> 

                    <div class="form-group"> 
                        <label for="tgl_jual">Tanggal Jual</label> 
                            <input type="date" class="form-control 
                            @error('tgl_jual') is-invalid @enderror" id="tgl_jual"
                            placeholder="Masukkan Tanggal" name="tgl_jual" value="{{$penjualan->tgl_jual ?? old('tgl_jual')}}"> 
                            @error('tgl_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group"> 
                            <label
                            for="total_jual">Total Jual</label> 
                            <input type="double" class="form-control 
                            @error('total_jual') is-invalid @enderror" id="total_jual"
                            placeholder="Masukan Total" name="total_jual" value="{{$penjualan->total_jual ?? old('total_jual')}}"> 
                            @error('total_jual') <span class="text-danger">{{$message}}</span> @enderror
                        </div> 

                        <div class="form-group">
                            <label for="id_user">User</label>
                            <div class="input-group">
                                <input type="hidden" name="id_user" id="id_user" value="{{$penjualan->fusers->id_user ?? old('id_user')}}">
                                <input type="text" class="form-control @error('users') is-invalid @enderror" placeholder="Users" id= "users" name="users" value="{{$penjualan->fusers->name ?? old('name')}}" aria-label="User" aria-describedby="cari" readonly>
                                <button class="btn btn-warning" type="button" data-bs-toggle="modal" id="cari" data-bs-target="#staticBackdrop">Cari Data User</button>
                            </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('distributor.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal untuk relasi ke user -->
    <div class="modal fade" id="staticBackdrop" data-bsbackdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-scrollable p-5">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5"
                                        id="staticBackdropLabel">Pencarian Data User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        
                                    <table class="table table-hover table-bordered tablestripped" id="example2">
                                        <thead>
                                            <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Level</th>
                                            <th>Aktif</th>
                                            <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->level}}</td>
                                            <td>{{$user->aktif}}</td>
                                            <td>
                                                    <button type="button" class="btn btn-primary 
                                                    btn-xs" onclick="pilih('{{$user->id}}', '{{$user->name}}', '{{$user->email}}', '{{$user->level}}', '{{$user->aktif}}' )" data-bs-dismiss="modal">
                                                    Pilih
                                                </button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> 
<!-- End Modal -->
@stop
@push('js') 
<script> 
$('#example2').DataTable({"responsive": true, });
 //Fungsi pilih untuk memilih data user dan mengirimkan data user dari Modal ke form tambah
function pilih1(id, distributor){
    document.getElementById('id_distributor').value = id
    document.getElementById('distributor').value = distributor
} 

function pilih2(id, user){
    document.getElementById('id_user').value = id
    document.getElementById('users').value = user
} 
</script> 
@endpush  