<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;

class laporancontroller extends Controller
{
    public function laporan(Request $request)
    {
        $data = penjualan::all();
        return view('laporan', [
            'data' => $data,
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $data = penjualan::all();
        return view('laporan-pdf', [
            'data' => $data,
        ]);
        // $pdf = PDF::loadView('laporan-pdf', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
    }
}
