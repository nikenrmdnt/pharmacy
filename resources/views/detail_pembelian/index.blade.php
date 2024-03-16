@extends('adminlte::page')
@section('title', 'List Detail Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">List Detail Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nota Beli</th>
                            <th>Obat</th>
                            <th>Tgl Kadaluarsa</th>
                            <th>Harga Beli</th>
                            <th>Qty</th>
                            <th>Sub Total</th>
                            <th>Margin Jual</th>
                            <th>Harga Jual/pcs</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($detail_pembelian as $key => $detail_pembelian)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$detail_pembelian->fpembelian->nonota_beli}}</td>
                                <td>{{$detail_pembelian->fobat->nama_obat}}</td>
                                <td>{{$detail_pembelian->tgl_kadaluarsa}}</td>
                                <td>Rp {{$detail_pembelian->harga_beli}}</td>
                                <td>{{$detail_pembelian->jumlah_beli}}</td>
                                <td>Rp {{$detail_pembelian->sub_total_beli}}</td>
                                <td>{{$detail_pembelian->persen_margin_jual}}%</td>
                                <td>Rp {{$detail_pembelian->harga_jual}}</td>
                                <td>
                                <a href="{{route('pembelian.index', $detail_pembelian)}}" class="btn btn-success btn-xs">
                                        Back
                                    </a>
                                </td>
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
            if (confirm('Apakah anda yakin akan menghapus data?')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }
    </script>
@endpush