<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\obat;
use App\Models\distributor;
use App\Models\pembelian;
use App\Models\detail_pembelian;

use Illuminate\Http\Request;

class pembeliancontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data pembelian
        $pembelian = pembelian::all();
        return view('pembelian.index', [
            'pembelian' => $pembelian
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah 
        return view(
            'pembelian.create',[
                'users' => user::all(), //mengirim data semua user ke form create data pembelian
                'distributor' => distributor::all() //mengirim data semua distributor ke form create data pembelian
            ]);
    }
    public function store(Request $request)
    {
        //Menyimpan Data penjualan
        // $request->validate([
        //     'nonota_jual' => 'required', 
        //     'tgl_jual' => 'required', 
        //     'total_jual' => 'required',
        //     'id_user' => 'required'
        // ]);
        $array = $request->only([
            'nonota_beli', 
            'tgl_beli', 
            'total_beli',
            'id_distributor',
            'id_user'
        ]);

        $nonotabeli = $array['nonota_beli'];
        $pembelian = pembelian::create($array);
        $cari_id = pembelian::where('nonota_beli', '=', $nonotabeli)->get('id');
        return view(
            'detail_pembelian.create', [
                'pembelian' => pembelian::all(),
                'obat' => obat::all(),
                'distributor' => distributor::all(),
                'idbeli'=>$cari_id[0]['id'],
                'nonota_beli' => $array['nonota_beli']
            ]);
        // $cari_id = pembelian::where('nonota_beli', '=', 5413143242)->get('id');
        // dd($cari_id);
        // dd($cari_id[0]['id']);
        // return redirect()->route('detail_penbelian.create')->with('success_message', 'Berhasil menambah data penbelian baru');
        // pembelian::create($array);
        // return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menambah data pembelian baru');
    } 

//     public function edit($id)
//         {
//             //Menampilkan Form Edit
//             $pembelian = pembelian::find($id);
//             if (!$pembelian) return redirect()->route('pembelian.index')
//             ->with('error_message', 'data pembelian dengan id'.$id.' tidak ditemukan');
//             return view('pembelian.edit', [
//                 'pembelian' => $pembelian,
//                 'users' => user::all(), //mengirimkan semua data user ke modal pada halaman edit
//                 'distributor' => distributor::all()
//             ]);
//         }

//         public function update(Request $request, $id)
//         {
//             //Mengedit Data Pembelian
//             $request->validate([
//                 'nonota_beli' => 'required', 
//                 'tgl_beli' => 'required', 
//                 'total_beli' => 'required',
//                 'id_distributor' => 'required',
//                 'id_user' => 'required'
//             ]);

//             $pembelian = pembelian::find($id);
//             $pembelian->nonota_beli = $request->nonota_beli;
//             $pembelian->tgl_beli = $request->tgl_beli;
//             $pembelian->total_beli = $request->total_beli;
//             $pembelian->id_distributor = $request->id_distributor;
//             $pembelian->id_user = $request->id_user;
//             $pembelian->save();
//             return redirect()->route('pembelian.index')->with('success_message', 'Berhasil mengubah Data pembelian');
//             }

//             public function destroy(Request $request, $id)
//         {
//             //Menghapus Data
//             $pembelian = pembelian::find($id);
//             if ($pembelian) $pembelian->delete();
//             return redirect()->route('pembelian.index')->with('success_message', 'Berhasil menghapus pembelian');
//         }
}
