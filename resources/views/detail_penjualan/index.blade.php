@extends('adminlte::page')
@section('title', 'List Detail Penjualan')
@section('content_header')
<h1 class="m-0 text-dark">List Detail Penjualan</h1>
@stop
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- <a href="{{route('detail_penjualan.create')}}" class="btn 
btn-primary mb-2">
                    Tambah
                </a> -->
                <table class="table table-hover table-bordered 
table-stripped" id="example2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nota Jual</th>
                            <th>Obat</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detail_penjualan as $key => $detail_penjualan)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$detail_penjualan->fpenjualan->nonota_jual}}</td>
                            <td>{{$detail_penjualan->fobat->nama_obat}}</td>
                            <td>Rp {{$detail_penjualan->harga_jual}}</td>
                            <td>{{$detail_penjualan->jumlah_jual}}</td>
                            <td>Rp {{$detail_penjualan->sub_total_jual}}</td>
                            <td>
                                    <a href="{{route('penjualan.index', $detail_penjualan)}}" class="btn btn-success btn-xs">
                                        Back
                                    </a>
                            </td>
                            <!-- <td>
                                <a href="{{route('detail_penjualan.edit', 
$detail_penjualan)}}" class="btn btn-primary btn-xs">
                                    Edit
                                </a>
                                <a href="{{route('detail_penjualan.destroy', $detail_penjualan)}}" onclick="notificationBeforeDelete(ev
ent, this, <?php echo $key+1; ?>)" class="btn btn-danger btn-xs">
                                    Delete
                                </a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop
@push('js')
<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>
<script>
    $('#example2').DataTable({
        "responsive": true,
    });
        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
</script>
@endpush