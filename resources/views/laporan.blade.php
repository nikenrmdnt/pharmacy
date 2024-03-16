@extends('adminlte::page')
@section('title', 'Laporan Penjualan')
@section('content_header')
    <h1 class="m-0 text-dark">Laporan Penjualan</h1>
@stop
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <p>
                <a href="{{url('download-laporan-pdf')}}" target="_blank">
                    <button class="btn btn-success"><i class="fa fa-file "></i> &nbsp; Cetak Laporan</button>
                </a>
                <a href="{{url('laporandpj')}}">
                    <button class="btn btn-primary"><i class="fa fa-book "></i> &nbsp; Lihat Detail Laporan</button>
                </a>
    </p>
    <h5>TOTAL PENJUALAN = <strong>Rp {{number_format($data->sum('total_jual'))}}</strong></h5>
                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nota Penjualan</th>
                            <th>Tanggal</th>
                            <th>Total</th>
                            <th>User</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $key => $data)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$data->nonota_jual}}</td>
                                <td>{{$data->tgl_jual}}</td>
                                <td>Rp {{$data->total_jual}}</td>
                                <td>{{$data->fusers->name}}</td>
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
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.print.min.js"></script>
@endpush