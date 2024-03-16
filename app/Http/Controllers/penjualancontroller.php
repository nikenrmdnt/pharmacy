<?php

namespace App\Http\Controllers;
use App\Models\penjualan;
use App\Models\User;
use App\Models\obat;
use App\Models\detail_penjualan;
use Illuminate\Http\Request;

class penjualancontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Penjualan
        $penjualan = penjualan::all();
        return view('penjualan.index', [
            'penjualan' => $penjualan
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah 
        return view(
            'penjualan.create',[
                'users' => user::all() //mengirim data semua user ke form create data penjualan
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
            'nonota_jual',
            'tgl_jual',
            'total_jual',
            'id_user'
        ]);
        
        $nonotajual = $array['nonota_jual'];
        // $cari_id = penjualan::where('nonota_jual', '=', 5413143242)->get('id');
        // dd($cari_id);
        $penjualan = penjualan::create($array);
        $cari_id = penjualan::where('nonota_jual', '=', $nonotajual)->get('id');
        // dd($cari_id[0]['id']);
        // return redirect()->route('detail_penjualan.create')->with('success_message', 'Berhasil menambah data penjualan baru');
        return view(
            'detail_penjualan.create', [
                'penjualan' => penjualan::all(),
                'obat' => obat::all(),
                'idjual'=>$cari_id[0]['id'],
                'nonota_jual' => $array['nonota_jual']
            ]
            );
    } 

    // public function show($id)
    // {
    //     //tampil detail yg dipilih
    //     $detail_penjualan = detail_penjualan::find($id) -> detail_penjualan;
    //     $penjualan = penjualan::find($id) -> penjualan;
    //     $detail_penjualan = detail_penjualan::where('id', '=', $penjualan)->get();
    //     $detail_penjualan = $detail_penjualan[0]['detailpenjualan'];

    //     return view('detail_penjualan.index', [
    //         'nonota_jual' => $id,
    //         'detail_penjualan' => detail_penjualan::where('nonota_jual', '=', $id)->get()
    //     ]);
    // }

//     public function edit($id)
//         {
//             //Menampilkan Form Edit
//             $penjualan = penjualan::find($id);
//             if (!$penjualan) return redirect()->route('penjualan.index')
//             ->with('error_message', 'data penjualan dengan id'.$id.' tidak ditemukan');
//             return view('penjualan.edit', [
//                 'penjualan' => $penjualan,
//                 'users' => user::all() //mengirimkan semua data user ke modal pada halaman edit
//             ]);
//         }

//         public function update(Request $request, $id)
//         {
//             //Mengedit Data Obat
//             $request->validate([
//                 'nonota_jual' => 'required', 
//                 'tgl_jual' => 'required', 
//                 'total_jual' => 'required',
//                 'id_user' => 'required'
//             ]);

//             $penjualan = penjualan::find($id);
//             $penjualan->nonota_jual = $request->nonota_jual;
//             $penjualan->tgl_jual = $request->tgl_jual;
//             $penjualan->total_jual = $request->total_jual;
//             $penjualan->id_user = $request->id_user;
//             $penjualan->save();
//             return redirect()->route('penjualan.index')->with('success_message', 'Berhasil mengubah Data Penjualan');
//             }

//             public function destroy(Request $request, $id)
//         {
//             //Menghapus Data
//             $penjualan = penjualan::find($id);
//             if ($penjualan) $penjualan->delete();
//             return redirect()->route('penjualan.index')->with('success_message', 'Berhasil menghapus penjualan');
//         }
    }
