<?php

namespace App\Http\Controllers;

use App\Models\distributor;
use App\Models\obat;
use App\Models\pembelian;
use Illuminate\Http\Request;

class laporanpbcontroller extends Controller
{
    public function laporan(Request $request)
    {
        $data = pembelian::all();
        return view('laporanpb', [
            'data' => $data,
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $data = pembelian::all();
        return view('laporanpb-pdf', [
            'data' => $data,
        ]);
        // $pdf = PDF::loadView('laporan-pdf', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
    }
}
