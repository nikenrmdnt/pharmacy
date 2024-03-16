<?php

namespace App\Http\Controllers;
use App\Models\distributor;
use Illuminate\Http\Request;

class distributorcontroller extends Controller
{
    public function index()
    {
        //Menampilkan Semua Data Distributor
        $distributor = distributor::all();
        return view('distributor.index', [
            'distributor' => $distributor
        ]);
    } 

    public function create()
    {
        //Menampilkan Form Tambah 
        return view('distributor.create');
    }
    public function store(Request $request)
    {
        // Menyimpan Data distributor
        $request->validate([
            'nama_distributor' => 'required', 
            'alamat' => 'required', 
            'notelepon' => 'required'
        ]);
        $array = $request->only([
            'nama_distributor', 
            'alamat', 
            'notelepon'
        ]);
        $distributor = distributor::create($array);
        return redirect()->route('distributor.index')->with('success_message', 'Berhasil menambah data distributor baru');
    } 

    public function edit($id)
        {
            //Menampilkan Form Edit
            $distributor = distributor::find($id);
            if (!$distributor) return redirect()->route('distributor.index')
            ->with('error_message', 'distributor dengan id'.$id.' tidak ditemukan');
            return view('distributor.edit', [
                'distributor' => $distributor
            ]);
        }

        public function update(Request $request, $id)
        {
            //Mengedit Data Obat
            $request->validate([
            'nama_distributor' => 'required', 
            'alamat' => 'required', 
            'notelepon' => 'required'
            ]);

            $distributor = distributor::find($id);
            $distributor->nama_distributor = $request->nama_distributor;
            $distributor->alamat = $request->alamat;
            $distributor->notelepon = $request->notelepon;
            $distributor->save();
            return redirect()->route('distributor.index')->with('success_message', 'Berhasil mengubah Data distributor');
            }

            public function destroy(Request $request, $id)
        {
            //Menghapus User
            $distributor = distributor::find($id);
            if ($distributor) $distributor->delete();
            return redirect()->route('distributor.index')->with('success_message', 'Berhasil menghapus distributor');
        }
}
