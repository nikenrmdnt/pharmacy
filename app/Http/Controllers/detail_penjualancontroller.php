<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penjualan;
use App\Models\obat;
use App\Models\detail_penjualan;

class detail_penjualancontroller extends Controller
{
    //Menampilkan data detail penjualan
    public function index()
    {
        //Menampilkan Detail Penjualan
        $detail_penjualan = detail_penjualan::all();
        return view('detail_penjualan.index', [
            'detail_penjualan' => $detail_penjualan
        ]);
    }

    public function create()
    {
    //Menampillkan Form Tambah Detail Penjualan
    return view(
        'detail_penjualan.create', [
            'penjualan' => penjualan::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
            'obat' => obat::all() //Mengirim semua data Obat ke Modal pada halaman create
        ]
        );
    }

    public function store(Request $request)
    {
        // dd($request);
        //Menyimpan Data Detail Penjualan
        $request->validate([
            'id_penjualan' => 'required',
            'jumlah_jual' => 'required',
            'harga_jual' => 'required',
            'sub_total_jual' => 'required',
            'id_obat' => 'required'
        ]);
        $array = $request->only([
            'id_penjualan',
            'jumlah_jual',
            'harga_jual',
            'sub_total_jual',
            'id_obat'
        ]);
        detail_penjualan::create($array);
        return view(
            'detail_penjualan.create', [
                'penjualan' => penjualan::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
                'obat' => obat::all(), //Mengirim semua data Obat ke Modal pada halaman create
                'idjual' => $array['id_penjualan'],
                'nonota_jual' => $request['nonota_jual']
            ]
            );
        // return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menambah data detail penjualan');
    }

    // public function edit($id)
    //     {
    //         //Menampilkan Form Edit
    //         $detail_penjualan = detail_penjualan::find($id);
    //         if (!$detail_penjualan) return redirect()->route('detail_penjualan.index')
    //         ->with('error_message', 'data penjualan dengan id'.$id.' tidak ditemukan');
    //         return view('detail_penjualan.edit', [
    //             'detail_penjualan' => $detail_penjualan,
    //             'penjualan' => penjualan::all(), //mengirim data semua user ke form create data penjualan
    //             'obat' => obat::all() //mengirim data semua distributor ke form create data penjualan
    //         ]);
    //     }

    //     public function update(Request $request, $id)
    //     {
    //         //Mengedit Data penjualan
    //         $request->validate([
    //             'id_penjualan' => 'required',
    //             'jumlah_jual' => 'required',
    //             'harga_jual' => 'required',
    //             'sub_total_jual' => 'required',
    //             'id_obat' => 'required'
    //         ]);

    //         $detail_penjualan = detail_penjualan::find($id);
    //         $detail_penjualan->id_penjualan = $request->id_penjualan;
    //         $detail_penjualan->jumlah_jual = $request->jumlah_jual;
    //         $detail_penjualan->harga_jual = $request->harga_jual;
    //         $detail_penjualan->sub_total_jual = $request->sub_total_jual;
    //         $detail_penjualan->id_obat = $request->id_obat;
    //         $detail_penjualan->save();
    //         return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil mengubah Data detail_penjualan');
    //         }

    //         public function destroy(Request $request, $id)
    //     {
    //         //Menghapus Data
    //         $detail_penjualan = detail_penjualan::find($id);
    //         if ($detail_penjualan) $detail_penjualan->delete();
    //         return redirect()->route('detail_penjualan.index')->with('success_message', 'Berhasil menghapus detail_penjualan');
    //     }
}