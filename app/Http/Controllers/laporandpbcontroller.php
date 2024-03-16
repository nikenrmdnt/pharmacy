<?php

namespace App\Http\Controllers;

use App\Models\detail_pembelian;
use Illuminate\Http\Request;

class laporandpbcontroller extends Controller
{
    public function laporan(Request $request)
    {
        $data = detail_pembelian::all();
        return view('laporandpb', [
            'data' => $data,
        ]);
    }

    public function downloadpdf(Request $request)
    {
        $data = detail_pembelian::all();
        return view('laporandpb-pdf', [
            'data' => $data,
        ]);
        // $pdf = PDF::loadView('laporan-pdf', compact('data'));
        // $pdf->setPaper('A4', 'potrait');
    }
}
