<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>19Pharmacy</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid;
        text-align: center;
        background-color: #bee8c2;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <h1 class="text-center">LAPORAN PENJUALAN 19Pharmacy</h1>
        <h5>TOTAL PENJUALAN = <strong>Rp {{number_format($data->sum('total_jual'))}}</strong></h5>
        <table class="table table th">
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
                                <td class="text-center" width="20">{{$key+1}}</td>
                                <td>{{$data->nonota_jual}}</td>
                                <td class="text-center">{{$data->tgl_jual}}</td>
                                <td>Rp {{$data->total_jual}}</td>
                                <td class="text-center">{{$data->fusers->name}}</td>
                            </tr>
                        @endforeach
                        </tbody>
        </table>
    </section>
</body>
</html>