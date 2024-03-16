<?php

namespace App\Http\Controllers;
use App\Models\obat;
use Illuminate\Http\Request;

class obatcontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Obat
        $obat = obat::all();
        return view('obat.index', [
            'obat' => $obat
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah obat
        return view('obat.create');
    }
    public function store(Request $request)
    {
        //Menyimpan Data obat
        // $request->validate([
        //     'kode_obat' => 'required',
        //     'nama_obat' => 'required', 
        //     'merk' => 'required', 
        //     'jenis' => 'required', 
        //     'satuan' => 'required', 
        //     'golongan' => 'required', 
        //     'kemasan' => 'required', 
        //     'harga_jual' => 'required', 
        //     'stock' => 'required'
        // ]);
        $array = $request->only([
            'kode_obat',
            'nama_obat', 
            'merk', 
            'jenis', 
            'satuan', 
            'golongan', 
            'kemasan', 
            'harga_jual', 
            'stock'
        ]);
        $obat = obat::create($array);
        return redirect()->route('obat.index')->with('success_message', 'Berhasil menambah data Obat baru');
    } 

    public function edit($id)
        {
            //Menampilkan Form Edit
            $obat = obat::find($id);
            if (!$obat) return redirect()->route('obat.index')
            ->with('error_message', 'Obat dengan id'.$id.' tidak ditemukan');
            return view('obat.edit', [
                'obat' => $obat
            ]);
        }

        public function update(Request $request, $id)
        {
            //Mengedit Data Obat
            // $request->validate([
            // 'kode_obat' => 'required',
            // 'nama_obat' => 'required', 
            // 'merk' => 'required', 
            // 'jenis' => 'required', 
            // 'satuan' => 'required', 
            // 'golongan' => 'required', 
            // 'kemasan' => 'required', 
            // 'harga_jual' => 'required', 
            // 'stock' => 'required'
            // ]);

            $obat = obat::find($id);
            $obat->kode_obat = $request->kode_obat;
            $obat->nama_obat = $request->nama_obat;
            $obat->merk = $request->merk;
            $obat->jenis = $request->jenis;
            $obat->satuan = $request->satuan;
            $obat->golongan = $request->golongan;
            $obat->kemasan = $request->kemasan;
            $obat->harga_jual = $request->harga_jual;
            $obat->stock = $request->stock;
            $obat->save();
            return redirect()->route('obat.index')->with('success_message', 'Berhasil mengubah Data Obat');
            }

            public function destroy(Request $request, $id)
        {
            //Menghapus User
            $obat = obat::find($id);
            if ($obat) $obat->delete();
            return redirect()->route('obat.index')->with('success_message', 'Berhasil menghapus obat');
        }
}
