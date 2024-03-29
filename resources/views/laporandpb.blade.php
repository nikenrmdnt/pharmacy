@extends('adminlte::page')
@section('title', 'Detail Laporan Pembelian')
@section('content_header')
    <h1 class="m-0 text-dark">Detail Laporan Pembelian</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <p>
                <a href="{{url('download-laporandpb-pdf')}}" target="_blank">
                    <button class="btn btn-success"><i class="fa fa-file "></i> &nbsp; Cetak Detail Laporan</button>
                </a>
    </p>
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
                        @foreach($data as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->fpembelian->nonota_beli}}</td>
                                <td>{{$data->fobat->nama_obat}}</td>
                                <td>{{$data->tgl_kadaluarsa}}</td>
                                <td>Rp {{$data->harga_beli}}</td>
                                <td>{{$data->jumlah_beli}}</td>
                                <td>Rp {{$data->sub_total_beli}}</td>
                                <td>{{$data->persen_margin_jual}}%</td>
                                <td>Rp{{$data->harga_jual}}</td>
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
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
@endpush