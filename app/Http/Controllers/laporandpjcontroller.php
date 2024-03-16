<?php

namespace App\Http\Controllers;

use App\Models\detail_penjualan;
use Illuminate\Http\Request;

class laporandpjcontroller extends Controller
{
    public function laporan(Request $request)
    {
        $data = detail_penjualan::all();
        return view('laporandpj', [
            'data' => $data,
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $data = detail_penjualan::all();
        return view('laporandpj-pdf', [
            'data' => $data,
        ]);
        // $pdf = PDF::loadView('laporan-pdf', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
    }
}
