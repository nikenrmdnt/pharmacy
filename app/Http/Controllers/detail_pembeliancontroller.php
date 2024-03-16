<?php

namespace App\Http\Controllers;
use App\Models\detail_pembelian;
use App\Models\pembelian;
use App\Models\distributor;
use App\Models\obat;

use Illuminate\Http\Request;

class detail_pembeliancontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Detail pembelian
        $detail_pembelian = detail_pembelian::all();
        return view('detail_pembelian.index', [
            'detail_pembelian' => $detail_pembelian
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah 
        return view(
            'detail_pembelian.create',[
                'pembelian' => pembelian::all(), //mengirim data semua user ke form create data pembelian
                'obat' => obat::all() //mengirim data semua distributor ke form create data pembelian
            ]);
    }
    public function store(Request $request)
    {
        //Menyimpan Data Detail pembelian
        // dd($request);
        $request->validate([
            'id_pembelian' => 'required', 
            'tgl_kadaluarsa' => 'required',
            'harga_beli' => 'required',
            'jumlah_beli' => 'required',
            'sub_total_beli' => 'required',
            'persen_margin_jual' => 'required',
            'harga_jual' => 'required',
            'id_obat' => 'required'
        ]);
        $array = $request->only([
            'id_pembelian', 
            'tgl_kadaluarsa',
            'harga_beli',
            'jumlah_beli',
            'sub_total_beli',
            'persen_margin_jual',
            'harga_jual',
            'id_obat'
        ]);
        
        detail_pembelian::create($array);
        return view(
            'detail_pembelian.create', [
                'pembelian' => pembelian::all(), //Mengirim semua data Penjualan ke Modal pada halaman create
                'obat' => obat::all(), //Mengirim semua data Obat ke Modal pada halaman create
                'idbeli' => $array['id_pembelian'],
                'nonota_beli' => $request['nonota_beli']
            ]
            );
    } 
}